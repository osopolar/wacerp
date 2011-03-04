<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName = $invokeParams['attachInfo']['name'];
$modulePrefixName = $invokeParams['contextInfo']['moduleName'] . $invokeParams['attachInfo']['name'];
$moduleTreeId = WacModuleHelper::getTreeId($moduleName, $moduleAttachName);
$moduleCaption = WacModule::getInstance()->getCaption($moduleName) . __("List");
//print_r($invokeParams['contextInfo']);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleTreeId, true); ?>
<div id="<?php echo $moduleTreeId; ?>" class="wacTreeFrame"></div>

<script type="text/javascript">
    //<![CDATA[
    $("#<?php echo $moduleTreeId; ?>").ready(function(){
        var wacImagesPath    = <?php echo "'" . sfConfig::get("app_wac_setting_images_path") . "'" ?>;

        var moduleName       = <?php echo "'{$moduleName}'" ?>;
        var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
        var modulePrefixId   = '#' + modulePrefixName;
        var moduleTreeId     = '#' + <?php echo "'{$moduleTreeId}'" ?>;
        var moduleCaption    = <?php echo "'{$moduleCaption}'" ?>;
        var moduleUrl        = WacAppConfig.baseUrl + moduleName + "/";


        init();
        bindEvents();

        function init(){
            $(moduleTreeId)
            .jstree({ 
                // the list of plugins to include
                "plugins" : [ "themes", "json_data", "ui", "crrm", "cookies", "dnd", "search", "types", "hotkeys", "contextmenu" ],
                // Plugin configuration

                // I usually configure the plugin that handles the data first - in this case JSON as it is most common
                "json_data" : { 
                    // I chose an ajax enabled tree - again - as this is most common, and maybe a bit more complex
                    // All the options are the same as jQuery's except for `data` which CAN (not should) be a function
                    "ajax" : {
                        // the URL to fetch the data
                        "url" : moduleUrl + "getChildren",
                        // this function is executed in the instance's scope (this refers to the tree instance)
                        // the parameter is the node being loaded (may be -1, 0, or undefined when loading the root nodes)
                        "data" : function (n) { 
                            // the result is fed to the AJAX request `data` option
                            return {
                                "dataFormat" : "json",
                                "id" : n.attr ? n.attr("id").replace("node_","") : 1 
                            }; 
                        }
                    }
                },
                // Configuring the search plugin
                "search" : {
                    // As this has been a common question - async search
                    // Same as above - the `ajax` config option is actually jQuery's object (only `data` can be a function)
                    "ajax" : {
                        "url" : moduleUrl + "search",
                        // You get the search string as a parameter
                        "data" : function (str) {
                            return { 
                                "dataFormat" : "json",
                                "search_str" : str 
                            }; 
                        }
                    }
                },
                // Using types - most of the time this is an overkill
                // Still meny people use them - here is how
                "types" : {
                    // I set both options to -2, as I do not need depth and children count checking
                    // Those two checks may slow jstree a lot, so use only when needed
                    "max_depth" : -2,
                    "max_children" : -2,
                    // I want only `drive` nodes to be root nodes 
                    // This will prevent moving or creating any other type as a root node
                    "valid_children" : [ "drive" ],
                    "types" : {
                        // The default type
                        "default" : {
                            // I want this type to have no children (so only leaf nodes)
                            // In my case - those are files
                            "valid_children" : "none",
                            // If we specify an icon for the default type it WILL OVERRIDE the theme icons
                            "icon" : {
                                "image" : wacImagesPath + "js_icons/leaf.png"
                            }
                        },
                        // The `folder` type
                        "branch" : {
                            // can have files and other folders inside of it, but NOT `drive` nodes
                            "valid_children" : [ "default", "branch" ],
                            "icon" : {
                                "image" : wacImagesPath + "js_icons/branch.png"
                            }
                        },
                        // The `drive` nodes 
                        "root" : {
                            // can have files and folders inside, but NOT other `drive` nodes
                            "valid_children" : [ "default", "branch" ],
                            "icon" : {
                                "image" : wacImagesPath + "js_icons/root.png"
                            },
                            // those options prevent the functions with the same name to be used on the `drive` type nodes
                            // internally the `before` event is used
                            "start_drag" : false,
                            "move_node" : false,
                            "delete_node" : false,
                            "remove" : false
                        }
                    }
                },
                // For UI & core - the nodes to initially select and open will be overwritten by the cookie plugin

                // the UI plugin - it handles selecting/deselecting/hovering nodes
                "ui" : {
                    // this makes the node with ID node_4 selected onload
                    "initially_select" : [ "node_4" ]
                },

                // contextmenu
                "contextmenu": {
                    items : { // Could be a function that should return an object like this one
                        "create_branch" : {
                            "icon" : wacImagesPath + "js_icons/branch.png",
                            "separator_before"  : false,
			    "separator_after"   : true,
                            "label"             : "<?php echo __("Create Folder");?>",
                            "action"            : function (obj) {Wac.log(obj); this.create(obj); }
                        },
                        "create" : {
                            "icon" : wacImagesPath + "js_icons/file.png",
                            "label" : "<?php echo __("Create File");?>"
                        },
                        "rename" : {
                            "icon" : wacImagesPath + "js_icons/edit.png",
                            "label" : "<?php echo __("Rename");?>"
                        },
                        "remove" : {
                            "icon" : wacImagesPath + "js_icons/delete.png",
                            "label" : "<?php echo __("Delete");?>"
                        },
                        "ccp" : {
                            "icon" : wacImagesPath + "js_icons/They-reply-technosorcery-icon.png",
                            "separator_after" : false,
                            "label" : "<?php echo __("Edit");?>",
                            "submenu" : {
                                "cut" : {
                                    "icon" : wacImagesPath + "js_icons/cut.png",
                                    "separator_before"	: false,
                                    "separator_after"	: false,
                                    "label"             : "<?php echo __("Cut");?>"
                                },
                                "copy" : {
                                    "icon" : wacImagesPath + "js_icons/copy.png",
                                    "separator_before"	: false,
                                    "separator_after"	: false,
                                    "label"             : "<?php echo __("Copy");?>"
                                },
                                "paste" : {
                                    "icon" : wacImagesPath + "js_icons/paste.png",
                                    "separator_before"	: false,
                                    "separator_after"	: false,
                                    "label"             : "<?php echo __("Paste");?>"
                                }
                            }
                        }
                    }
                },

                // the core plugin - not many options here
                "core" : { 
                    // just open those two nodes up
                    // as this is an AJAX enabled tree, both will be downloaded from the server
                    "initially_open" : [ "node_2" , "node_3" , "node_6" ] 
                }
            })
            .bind("create.jstree", function (e, data) {
                $.post(
                moduleUrl + "createNode",
                {
                    "dataFormat" : "json",
                    "id" : data.rslt.parent.attr("id").replace("node_",""),
                    "position" : data.rslt.position,
                    "caption" : data.rslt.name,
                    "type" : data.rslt.obj.attr("rel")
                },
                function (r) {
                    if(r.status) {
                        $(data.rslt.obj).attr("id", "node_" + r.id);
                    }
                    else {
                        $.jstree.rollback(data.rlbk);
                    }
                }
            );
            })
            .bind("remove.jstree", function (e, data) {
                if(data !== undefined){
                    data.rslt.obj.each(function () {
                        $.ajax({
                            async : false,
                            type: 'POST',
                            url: moduleUrl + "removeNode",
                            data : {
                                "dataFormat" : "json",
                                "id" : this.id.replace("node_","")
                            },
                            success : function (r) {
                                if(!r.status) {
                                    data.inst.refresh();
                                }
                            }
                        });
                    });
                }
            })
            .bind("rename.jstree", function (e, data) {
                $.post(
                moduleUrl + "editNode",
                {
                    "dataFormat" : "json",
                    "id" : data.rslt.obj.attr("id").replace("node_",""),
                    "caption" : data.rslt.new_name
                },
                function (r) {
                    if(!r.status) {
                        $.jstree.rollback(data.rlbk);
                    }
                }
            );
            });
            //            .bind("move_node.jstree", function (e, data) {
            //                data.rslt.o.each(function (i) {
            //                    $.ajax({
            //                        async : false,
            //                        type: 'POST',
            //                        url: moduleUrl + "moveNode",
            //                        data : {
            //                            "dataFormat" : "json",
            //                            "id" : $(this).attr("id").replace("node_",""),
            //                            "ref" : data.rslt.np.attr("id").replace("node_",""),
            //                            "position" : data.rslt.cp + i,
            //                            "caption" : data.rslt.name,
            //                            "copy" : data.rslt.cy ? 1 : 0
            //                        },
            //                        success : function (r) {
            //                            if(!r.status) {
            //                                $.jstree.rollback(data.rlbk);
            //                            }
            //                            else {
            //                                $(data.rslt.oc).attr("id", "node_" + r.id);
            //                                if(data.rslt.cy && $(data.rslt.oc).children("UL").length) {
            //                                    data.inst.refresh(data.inst._get_parent(data.rslt.oc));
            //                                }
            //                            }
            //                            $("#analyze").click();
            //                        }
            //                    });
            //                });
            //            });
        };  // init end
         
        function bindEvents(){};  //bindEvnts end

    })
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleTreeId, false); ?>