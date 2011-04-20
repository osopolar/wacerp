<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName              = $invokeParams['contextInfo']['moduleName'];
$moduleGlobalName        = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName     = WacModuleHelper::getElementId($moduleName, $invokeParams['attachInfo'], "listTable");;
$componentGlobalId       = "#".$componentGlobalName;
$componentList           =  WacModuleHelper::getListId($moduleName, $invokeParams['attachInfo']);
$componentListingTableId = WacModuleHelper::getListingTableId($moduleName, $invokeParams['attachInfo']);
$componentListingTablePagerId = WacModuleHelper::getPagerId($moduleName, $invokeParams['attachInfo']);
$componentCaption        = WacModule::getInstance()->getCaption($moduleName) . __("List");
//print_r($contextInfo);
?>

<?php OutputHelper::getInstance()->writeNote("{$moduleName}-{$componentList}, begin");?>
<div id="<?php echo $componentList; ?>">
    <table id="<?php echo $componentListingTableId; ?>"></table>
    <div id="<?php echo $componentListingTablePagerId; ?>" ></div>
</div>

<script type="text/javascript">
        //<![CDATA[
        $("#<?php echo $componentList; ?>").ready(function(){
            var moduleName           = <?php echo "'{$moduleName}'" ?>;
            var moduleGlobalName     = <?php echo "'{$moduleGlobalName}'" ?>;
            var componentGlobalName  = <?php echo "'{$componentGlobalName}'" ?>;
            var componentGlobalId    = <?php echo "'{$componentGlobalId}'" ?>;
            var componentListingTableId = '#' + <?php echo "'{$componentListingTableId}'" ?>;
            var componentListingTablePagerId = '#' + <?php echo "'{$componentListingTablePagerId}'" ?>;
            var componentCaption     = <?php echo "'{$componentCaption}'" ?>;
            var toolbarSearchField   = <?php echo "'{$contextInfo["toolbarSearchField"]}'" ?>;


            //  define a callback object to handle the callback, optional for this table
            <?php echo $componentGlobalName; ?>Callback = new WacJqGridCallback("<?php echo $componentGlobalName; ?>");

            init();
            bindEvents();

            function init(){
                $(componentListingTableId).jqGrid({
                    datatype: WacEntity.extraParam.dataFormat,
                    url: WacAppConfig.baseUrl+"<?php echo $moduleName; ?>/getList",
                    editurl: WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/doOperation",
                    postData: WacEntity.extraParam,
                    colNames:[
                        <?php
                        echo WacModuleHelper::generateJqGridDisplayColLabels($contextInfo["listCols"]);
                        echo WacModuleHelper::generateJqGridHiddenFields(WacModuleHelper::getModuleTableFields($contextInfo["moduleName"]));
                        ?>
                        '<?php echo __("Action"); ?>'
                    ],
                    colModel:[
                        <?php
                        echo WacModuleHelper::generateJqGridDisplayColModels($contextInfo["listCols"]);
                        echo WacModuleHelper::generateJqGridHiddenFields(WacModuleHelper::getModuleTableFields($contextInfo["moduleName"]), true);
                        ?>
                            {name:'act', width:100, sortable:false, align:"center"}
                        ],
                        jsonReader : WacEntity.jsonReader,
                        rowNum:10,
                        rowList:[5,10,20,30,40,50],
                        sortname: 'id',
                        sortorder: "desc",
                        multiselect: false,
                        viewrecords: true,
                        pager: componentListingTablePagerId,
                        caption:"<?php echo $componentCaption; ?>",
                        height: '100%',
                        width: '100%',

                        gridComplete: function(){
                            var ids = $(componentListingTableId).jqGrid('getDataIDs');
                            var editUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/edit";
                            var delUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/delete";
                            for(var i=0;i < ids.length;i++){
                                var cl = ids[i];
                                <?php
                                $params = array(
                                    "moduleName"          => $moduleName,
                                    "moduleGlobalName"    => $moduleGlobalName,
                                    "subItemModuleName"   => "",
                                    "componentGlobalName" => $componentGlobalName,
                                    "attachInfo"          => $invokeParams['attachInfo']
                                );
                                echo WacModuleHelper::generateListBtns($params, $contextInfo["operatorBtns"], false);
                                ?>
                            }
                        },

                        loadError : function(xhr,st,err){
                            Wac.log("Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText);
                        },

                        loadComplete: function()
                        {
                            //        Wac.log($.dump($(componentListingTableId).jqGrid('getGridParam', 'userData')));
                            //        Wac.log("loadComplete");
                            $(this).trigger("tabsload");   // inform tabs event listener
                        }
               }); // grid end

               $(componentListingTableId).jqGrid('navGrid',componentListingTablePagerId,
                {edit:false, add:false, del:false, search:true, refresh:true, view:false, position:"left"},
                {afterSubmit: <?php echo $componentGlobalName; ?>Callback.validate, afterComplete: <?php echo $componentGlobalName; ?>Callback.edit},
                {afterSubmit: <?php echo $componentGlobalName; ?>Callback.validate, afterComplete: <?php echo $componentGlobalName; ?>Callback.add},
                {afterComplete: <?php echo $componentGlobalName; ?>Callback.del},
                {afterComplete: <?php echo $componentGlobalName; ?>Callback.search},
                {afterComplete: <?php echo $componentGlobalName; ?>Callback.view});
          };  // init end
         
        function bindEvents(){
            // listen search event
            $(document).hear(componentListingTableId, moduleGlobalName + WacAppConfig.event.app_wac_events_search_in_list, function ($self, data) {  // listenerid, event name, callback
                var params = $.extend({dataFormat :WacEntity.extraParam.dataFormat}, data);
                params.searchField = toolbarSearchField;  // this is a special case, for the name is code on table guardgroup
                $(componentListingTableId).jqGrid('setGridParam',{postData:params});
                $(componentListingTableId).trigger("reloadGrid");
                //                Wac.log(data);
            });

            // listen print event, throw out show print form event
            $(document).hear(componentListingTableId, moduleGlobalName + WacAppConfig.event.app_wac_events_data_print, function ($self, data) {  // listenerid, event name, callback
                var params = {};
                params.moduleName    = moduleName;
                params.componentCaption = componentCaption;
                params.moduleAction  = "getList";
                params.dataFormat    = "htmlTable";

                params[WacEntity.jqGridMetas.currentPage]  = $(componentListingTableId).jqGrid('getGridParam',"page");
                params[WacEntity.jqGridMetas.totalPages]   = $(componentListingTableId).jqGrid('getGridParam',"lastpage");
                params[WacEntity.jqGridMetas.rows]         = $(componentListingTableId).jqGrid('getGridParam',"rowNum");
                params[WacEntity.jqGridMetas.sortName]     = $(componentListingTableId).jqGrid('getGridParam',"sortname");
                params[WacEntity.jqGridMetas.sortOrder]    = $(componentListingTableId).jqGrid('getGridParam',"sortorder");

                $.shout(WacAppConfig.event.app_wac_events_show_data_print_form,params);
            });

            // listen export event, throw out show export form event
            $(document).hear(componentListingTableId, moduleGlobalName + WacAppConfig.event.app_wac_events_data_export, function ($self, data) {  // listenerid, event name, callback
                var params = {};
                params.moduleName = moduleName;
                params.componentCaption = componentCaption;
                
                params[WacEntity.jqGridMetas.currentPage]  = $(componentListingTableId).jqGrid('getGridParam',"page");
                params[WacEntity.jqGridMetas.totalPages]   = $(componentListingTableId).jqGrid('getGridParam',"lastpage");
                params[WacEntity.jqGridMetas.rows]         = $(componentListingTableId).jqGrid('getGridParam',"rowNum");
                params[WacEntity.jqGridMetas.sortName]     = $(componentListingTableId).jqGrid('getGridParam',"sortname");
                params[WacEntity.jqGridMetas.sortOrder]    = $(componentListingTableId).jqGrid('getGridParam',"sortorder");
                $.shout(WacAppConfig.event.app_wac_events_show_data_export_form,params);
            });
        };  //bindEvnts end

    })
   //]]>
</script>

<?php OutputHelper::getInstance()->writeNote("{$moduleName}-{$componentList}, end");?>