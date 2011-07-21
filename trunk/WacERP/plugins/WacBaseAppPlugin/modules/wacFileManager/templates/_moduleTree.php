<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName          = $contextInfo['moduleName'];
$moduleGlobalName    = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName = WacModuleHelper::getTreeId($moduleName, $invokeParams['attachInfo']);
$componentGlobalId   = "#".$componentGlobalName;
$componentCaption    = WacModule::getInstance()->getCaption($moduleName);

$rootNode = Doctrine::getTable(WacTable::getTableByModule($moduleName))->getUserRootNode();
//print_r($invokeParams['contextInfo']);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalId, true); ?>
<div id="<?php echo $componentGlobalName; ?>" class="wacFrame"></div>

<script type="text/javascript">
    //<![CDATA[
    $("<?php echo $componentGlobalId; ?>").ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });

    function <?php echo ucfirst($componentGlobalName); ?>(){
//        var wacImagesPath       = <?php echo "'" . sfConfig::get("app_wac_setting_images_path") . "'" ?>;
//        var moduleName          = <?php echo "'{$moduleName}'" ?>;
//        var moduleUrl           = WacAppConfig.baseUrl + moduleName + "/";
//        var moduleGlobalName    = <?php echo "'{$moduleGlobalName}'" ?>;
//        var componentGlobalName = <?php echo "'{$componentGlobalName}'" ?>;
//        var componentGlobalId   = <?php echo "'{$componentGlobalId}'" ?>;
//        var componentCaption    = <?php echo "'{$componentCaption}'" ?>;
        var _self              = this;
        this.wacImagesPath    = <?php echo "'" . sfConfig::get("app_wac_setting_images_path") . "'" ?>;
        this.appControllerId   = "wacAppController";  // be used to listen tab-remove event of the controller
        this.moduleName        = <?php echo "'{$moduleName}'" ?>;
        this.moduleGlobalName  = <?php echo "'{$moduleGlobalName}'" ?>;
        this.componentGlobalName = "<?php echo $componentGlobalName; ?>";
        this.componentGlobalId = "<?php echo $componentGlobalId; ?>";
        this.moduleUrl         = WacAppConfig.baseUrl + _self.moduleName + "/";
        this.uiPanelId         = WacEntity.module.getUiPanelId(_self.moduleName);  // to fix the bug that cannot remove dialog in tab panel when close tab, so need to point out the panel ui id here
        this.componentCaption  = <?php echo "'{$componentCaption}'" ?>;
        this.modelEntity     = {};

        this.init = function(){
            initTree();
            bindEvents();
        };  // init end

        this.initTree = function(){
            $(_self.componentGlobalId)
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
                        "url" : _self.moduleUrl + "getChildren",
                        // this function is executed in the instance's scope (this refers to the tree instance)
                        // the parameter is the node being loaded (may be -1, 0, or undefined when loading the root nodes)
                        "data" : function (n) {
                            // the result is fed to the AJAX request `data` option
                            return {
                                "dataFormat" : "json",
                                "id" : n.attr ? n.attr("id").replace("node_","").replace("copy_","") : <?php echo $rootNode->getId();?>
                            };
                        }
                    }
                },
                // Configuring the search plugin
                "search" : {
                    // As this has been a common question - async search
                    // Same as above - the `ajax` config option is actually jQuery's object (only `data` can be a function)
                    "ajax" : {
                        "url" : _self.moduleUrl + "search",
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
                            // If we specify an icon for the leaf type it WILL OVERRIDE the theme icons
                            "icon" : {
                                "image" : _self.wacImagesPath + "js_icons/leaf.png"
                            }
                        },
                        "leaf" : {
                            // I want this type to have no children (so only leaf nodes)
                            // In my case - those are files
                            "valid_children" : "none",
                            // If we specify an icon for the leaf type it WILL OVERRIDE the theme icons
                            "icon" : {
                                "image" : _self.wacImagesPath + "js_icons/leaf.png"
                            }
                        },
                        // The `folder` type
                        "branch" : {
                            // can have files and other folders inside of it, but NOT `drive` nodes
                            "valid_children" : [ "default", "branch", "leaf" ],
                            "icon" : {
                                "image" : _self.wacImagesPath + "js_icons/branch.png"
                            }
                        },
                        // The `drive` nodes
                        "root" : {
                            // can have files and folders inside, but NOT other `drive` nodes
                            "valid_children" : [ "default","root", "branch", "leaf" ],
                            "icon" : {
                                "image" : _self.wacImagesPath + "js_icons/root.png"
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
                    "initially_select" : [ "node_1" ]
                },

                // contextmenu
                "contextmenu": {
                    items : { // Could be a function that should return an object like this one
                        "create_branch" : {
                            "icon" : _self.wacImagesPath + "js_icons/branch.png",
                            "separator_before"  : false,
			    "separator_after"   : true,
                            "label"             : "<?php echo __("Create").__($invokeParams['config']["labelBranch"]);?>",
                            "action"            : function (obj) {
                                                      this.create( null, "last", { "attr" : { "rel" : "<?php echo JsTreeDataHelper::$typeBranch; ?>" } });
                                                   }
                        },
                        "create" : {
                            "icon" : _self.wacImagesPath + "js_icons/file.png",
                            "label" : "<?php echo __("Create").__($invokeParams['config']["labelNode"]);?>",
                            "action" : function (obj) {
//                                Wac.log($(obj).attr("rel"));
                                $.vakata.context.hide();
                                if($(obj).attr("rel") !== "<?php echo JsTreeDataHelper::$typeLeaf; ?>"){
                                    var params = {
                                        "id" : obj.attr("id").replace("node_","").replace("copy_",""),
                                        "type" : "<?php echo JsTreeDataHelper::$typeLeaf; ?>"
                                    }
                                    $.shout(_self.moduleGlobalName + WacAppConfig.event.app_wac_events_show_file_upload_form, params);
                                }                                
//                                this.create( null, "last", { "attr" : { "rel" : "<?php echo JsTreeDataHelper::$typeLeaf; ?>" } });
                            }
                        },
                        "rename" : {
                            "icon" : _self.wacImagesPath + "js_icons/edit.png",
                            "label" : "<?php echo __("Rename");?>"
                        },
                        "remove" : {
                            "icon" : _self.wacImagesPath + "js_icons/delete.png",
                            "label" : "<?php echo __("Delete");?>",
                            "action" : function (obj) {
                                var $self = this;
                                $(document).wacPage().showConfirm(
                                    $.i18n.prop('Delete confirm'),
                                    function(){$self.remove(obj);},
                                    function(){}
                                );
                            }
                        },
                        "ccp" : {
                            "icon" : _self.wacImagesPath + "js_icons/They-reply-technosorcery-icon.png",
                            "separator_after" : false,
                            "label" : "<?php echo __("Edit");?>",
                            "submenu" : {
                                "cut" : {
                                    "icon" : _self.wacImagesPath + "js_icons/cut.png",
                                    "separator_before"	: false,
                                    "separator_after"	: false,
                                    "label"             : "<?php echo __("Cut");?>"
                                },
                                "copy" : {
                                    "icon" : _self.wacImagesPath + "js_icons/copy.png",
                                    "separator_before"	: false,
                                    "separator_after"	: false,
                                    "label"             : "<?php echo __("Copy");?>"
                                },
                                "paste" : {
                                    "icon" : _self.wacImagesPath + "js_icons/paste.png",
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
                    "initially_open" : []
                }
            })
            .bind("create.jstree", function (e, data) {
                var params = {
                            "dataFormat" : "json",
                            "parent_id" : data.rslt.parent.attr("id").replace("node_","").replace("copy_",""),
                            "position" : data.rslt.position,
                            "caption" : data.rslt.name,
                            "type" : data.rslt.obj.attr("rel")
                        };

                    $.extend(params, _self.modelEntity);

                    $.ajax({
                        url: _self.moduleUrl + "createNode",
                        //        url: WacAppConfig.baseUrl + "test/ajaxTest" ,
                        global: true,
                        type: "POST",
                        data: params,
                        dataType: "json",
                        success: function(jsonData){
                            if(jsonData.info.status == WacEntity.operationStatus.succss){
                                $(data.rslt.obj).attr("id", "node_" + jsonData.modelEntity.id);
                            }
                            else{
                                $.jstree.rollback(data.rlbk);
                                $(document).wacPage().showTips(jsonData.info.message);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            Wac.log(errorThrown);
                            $(document).wacTool().dumpObj(this); // the options for this ajax request
                        }
                    });
//                $.post(
//                    _self.moduleUrl + "createNode",
//                    {
//                        "dataFormat" : "json",
//                        "id" : data.rslt.parent.attr("id").replace("node_","").replace("copy_",""),
//                        "position" : data.rslt.position,
//                        "caption" : data.rslt.name,
//                        "type" : data.rslt.obj.attr("rel")
//                    },
//                    function (r) {
//                        if(r.status) {
//                            $(data.rslt.obj).attr("id", "node_" + r.id);
//                        }
//                        else {
//                            $.jstree.rollback(data.rlbk);
//                        }
//                    }
//                );
            })
            .bind("remove.jstree", function (e, data) {
                if(data.rslt.parent == -1){
                    $(document).wacPage().showTips($.i18n.prop("Cannot remove root node!"));
                    return;
                }

                if(data !== undefined){
                    data.rslt.obj.each(function () {
                        $.ajax({
                            async : false,
                            type: 'POST',
                            url: _self.moduleUrl + "removeNode",
                            data : {
                                "dataFormat" : "json",
                                "id" : this.id.replace("node_","").replace("copy_","")
                            },
                            success : function (jsonData) {
                                if(jsonData.info.status == WacEntity.operationStatus.succss){
                                    data.inst.refresh();
                                }
                                else{
                                    $(document).wacPage().showTips(jsonData.info.message);
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                Wac.log(errorThrown);
                                $(document).wacTool().dumpObj(this); // the options for this ajax request
                            }
                        });
                    });
                }
//                if(data !== undefined){
//                    data.rslt.obj.each(function () {
//                        $.ajax({
//                            async : false,
//                            type: 'POST',
//                            url: _self.moduleUrl + "removeNode",
//                            data : {
//                                "dataFormat" : "json",
//                                "id" : this.id.replace("node_","").replace("copy_","")
//                            },
//                            success : function (r) {
//                                if(!r.status) {
//                                    data.inst.refresh();
//                                }
//                            }
//                        });
//                    });
//                }
            })
            .bind("rename.jstree", function (e, data) {
                var params = {
                        "dataFormat" : "json",
                        "id" : data.rslt.obj.attr("id").replace("node_","").replace("copy_",""),
                        "caption" : data.rslt.new_name
                };

                $.ajax({
                    url: _self.moduleUrl + "editNode",
                    //        url: WacAppConfig.baseUrl + "test/ajaxTest" ,
                    global: true,
                    type: "POST",
                    data: params,
                    dataType: "json",
                    success: function(jsonData){
                        if(jsonData.info.status != WacEntity.operationStatus.succss){
                            $.jstree.rollback(data.rlbk);
                            $(document).wacPage().showTips(jsonData.info.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        Wac.log(errorThrown);
                        $(document).wacTool().dumpObj(this); // the options for this ajax request
                    }
                });
//                $.post(
//                    _self.moduleUrl + "editNode",
//                    {
//                        "dataFormat" : "json",
//                        "id" : data.rslt.obj.attr("id").replace("node_","").replace("copy_",""),
//                        "caption" : data.rslt.new_name
//                    },
//                    function (r) {
//                        if(!r.status) {
//                            $.jstree.rollback(data.rlbk);
//                        }
//                    }
//                );
            })
            .bind("move_node.jstree", function (e, data) {
                data.rslt.o.each(function (i) {
                    $.ajax({
                        async : false,
                        type: 'POST',
                        url: _self.moduleUrl + "moveNode",
                        data : {
                            "dataFormat" : "json",
                            "id" : $(this).attr("id").replace("node_","").replace("copy_",""),
                            "target_parent_id" : data.rslt.np.attr("id").replace("node_","").replace("copy_",""),
                            "position" : data.rslt.cp + i,
                            "caption" : data.rslt.name,
                            "copy" : data.rslt.cy ? 1 : 0
                        },
                        success : function (jsonData) {
                            if(jsonData.info.status == WacEntity.operationStatus.succss){
                                $(data.rslt.oc).attr("id", "node_" + jsonData.modelEntity.id);
                                if(data.rslt.cy) {
                                    data.inst.refresh(data.inst._get_parent(data.rslt.oc));
                                }
                            }
                            else{
                                $.jstree.rollback(data.rlbk);
                                $(document).wacPage().showTips(jsonData.info.message);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            Wac.log(errorThrown);
                            $(document).wacTool().dumpObj(this); // the options for this ajax request
                        }
                    });
                });

//                data.rslt.o.each(function (i) {
//                    $.ajax({
//                        async : false,
//                        type: 'POST',
//                        url: _self.moduleUrl + "moveNode",
//                        data : {
//                            "dataFormat" : "json",
//                            "id" : $(this).attr("id").replace("node_","").replace("copy_",""),
//                            "target_parent_id" : data.rslt.np.attr("id").replace("node_","").replace("copy_",""),
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
//                        }
//                    });
//                });
            });
        };  // init end

        this.bindEvents = function(){
            $(document).hear(_self.componentGlobalId, _self.moduleGlobalName + WacAppConfig.event.app_wac_events_file_upload_complete, function ($self, data) {  // listenerid, event name, callback
                var node = $("li#"+data.id);
                $(_self.componentGlobalId).jstree("open_node", node);
                $(_self.componentGlobalId).jstree("refresh", node);
//                Wac.log("upload complete: ");
//                Wac.log(data);
            });

        };  //bindEvnts end

        this.init();

    }
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalId, false); ?>