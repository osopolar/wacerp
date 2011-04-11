<!-- module toolbar, begin-->
<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName          = $invokeParams['contextInfo']['moduleName'];
$moduleGlobalName    = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName = WacModuleHelper::getElementId($moduleName, $invokeParams['attachInfo'], "inlineTable");
$componentGlobalId   = "#".$componentGlobalName;
$listId              = WacModuleHelper::getlistId($moduleName, $invokeParams['attachInfo']);
$listingTableId      = WacModuleHelper::getlistingTableId($moduleName, $invokeParams['attachInfo']);
$listingTablePagerId = WacModuleHelper::getPagerId($moduleName, $invokeParams['attachInfo']);
$componentCaption    = WacModule::getInstance()->getCaption($moduleName) . __("List");
?>

<?php OutputHelper::getInstance()->writeNote("{$moduleName}-{$listId}, begin");?>
<div id="<?php echo $listId; ?>">
    <table id="<?php echo $listingTableId; ?>"></table>
    <div id="<?php echo $listingTablePagerId; ?>" ></div>

    <script type="text/javascript">

      $("#<?php echo $listId; ?>").ready(function(){
            var moduleName          = <?php echo "'{$moduleName}'" ?>;
            var moduleGlobalName    = <?php echo "'{$moduleGlobalName}'" ?>;
            var componentGlobalName = <?php echo "'{$componentGlobalName}'" ?>;
            var componentGlobalId   = <?php echo "'{$componentGlobalId}'" ?>;
            var listingTableId      = '#' + <?php echo "'{$listingTableId}'" ?>;
            var listingTablePagerId = '#' + <?php echo "'{$listingTablePagerId}'" ?>;
            var componentCaption    = <?php echo "'{$componentCaption}'" ?>;
            var toolbarSearchField  = <?php echo "'{$contextInfo["toolbarSearchField"]}'" ?>;

            //  define a callback object to handle the callback, optional for this table
            <?php echo $componentGlobalName; ?>Callback = new WacJqGridCallback("<?php echo $componentGlobalName; ?>");

            init();
            bindEvents();

            function init(){
                var lastSelectId;
                $(listingTableId).jqGrid({
                      datatype: WacEntity.extraParam.dataFormat,
                      url: WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/getList",
                      editurl: WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/doOperation/dataFormat/"+WacEntity.extraParam.dataFormat,
                      postData: WacEntity.extraParam,
                      colNames:[
                      <?php
                        echo WacModuleHelper::generateJqGridDisplayColLabels($contextInfo["listCols"]);
                      ?>
                      '<?php echo __("Action"); ?>'
                      ],
                      colModel:[
                        <?php
                        echo WacModuleHelper::generateJqGridDisplayColModels($contextInfo["listCols"]);
                        ?>
                          {name:'act', width:180, sortable:false, align:"center"}
                      ],
                      jsonReader : WacEntity.jsonReader,
                      rowNum:10,
                      rowList:[5,10,20,30,40,50],
                      sortname: 'id',
                      sortorder: "desc",
                      multiselect: true,
                      viewrecords: true,
                      pager: listingTablePagerId,
                      caption:"<?php echo WacModule::getInstance()->getCaption($moduleName) . __("List"); ?>",
                      height: '100%',
                      width: '100%',

                      gridComplete: function(){
                          var ids = $(listingTableId).jqGrid('getDataIDs');
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
                                echo WacModuleHelper::generateListBtns($params, $contextInfo["operatorBtns"], true);
                              ?>
                          }
                      },

                      onSelectRow: function(id){
                          if(id && id!==lastSelectId){
                             $(listingTableId).jqGrid('restoreRow',lastSelectId);
                             lastSelectId=id;
                          }
                      },

                      loadError : function(xhr,st,err){
                          Wac.log("Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText);
                      },

                      loadComplete: function()
                      {
    //                    Wac.log(componentGlobalName + "loadComplete");
                          $(this).trigger("tabsload");   // inform tabs event listener
                      }

                });  // grid end

                $(listingTableId).jqGrid('navGrid',listingTablePagerId,
                    {edit:true, add:true, del:true, search:true, refresh:true, view:true, position:"left"},
                    {afterSubmit: <?php echo $componentGlobalName; ?>Callback.validate, afterComplete: <?php echo $componentGlobalName; ?>Callback.edit},
                    {afterSubmit: <?php echo $componentGlobalName; ?>Callback.validate, afterComplete: <?php echo $componentGlobalName; ?>Callback.add},
                    {afterComplete: <?php echo $componentGlobalName; ?>Callback.del},
                    {afterComplete: <?php echo $componentGlobalName; ?>Callback.search},
                    {afterComplete: <?php echo $componentGlobalName; ?>Callback.view}
                );
            };  // init end

            function bindEvents(){
                // listen add event
                $(document).hear(listingTableId, moduleGlobalName + WacAppConfig.event.app_wac_events_show_add_form, function ($self, data) {  // listenerid, event name, callback
                    $(listingTableId).jqGrid('editGridRow', "new", {});
                });

                // listen search event
                $(document).hear(listingTableId, moduleGlobalName + WacAppConfig.event.app_wac_events_search_in_list, function ($self, data) {  // listenerid, event name, callback
                    var params = $.extend({dataFormat :WacEntity.extraParam.dataFormat}, data);
                    params.searchField = toolbarSearchField;  // this is a special case, for the name is code on table guardgroup
                    $(listingTableId).jqGrid('setGridParam',{postData:params});
                    $(listingTableId).trigger("reloadGrid");
//                    Wac.log(data);
                });

                $(document).hear(listingTableId, moduleGlobalName + WacAppConfig.event.app_wac_events_data_print, function ($self, data) {  // listenerid, event name, callback
                    var params = {};
                    params.moduleName = moduleName;
                    params.componentCaption = componentCaption;
                    params.moduleAction  = "getList";
                    params.dataFormat    = "htmlTable";
                    
                    params[WacEntity.jqGridMetas.currentPage]  = $(listingTableId).jqGrid('getGridParam',"page");
                    params[WacEntity.jqGridMetas.totalPages]   = $(listingTableId).jqGrid('getGridParam',"lastpage");
                    params[WacEntity.jqGridMetas.rows]         = $(listingTableId).jqGrid('getGridParam',"rowNum");
                    params[WacEntity.jqGridMetas.sortName]     = $(listingTableId).jqGrid('getGridParam',"sortname");
                    params[WacEntity.jqGridMetas.sortOrder]    = $(listingTableId).jqGrid('getGridParam',"sortorder");
                    
                    $.shout(WacAppConfig.event.app_wac_events_show_data_print_form,params);
                });

                $(document).hear(listingTableId, moduleGlobalName + WacAppConfig.event.app_wac_events_data_export, function ($self, data) {  // listenerid, event name, callback
                    var params = {};
                    params.moduleName = moduleName;
                    params.componentCaption = componentCaption;
                    
                    params[WacEntity.jqGridMetas.currentPage]  = $(listingTableId).jqGrid('getGridParam',"page");
                    params[WacEntity.jqGridMetas.totalPages]   = $(listingTableId).jqGrid('getGridParam',"lastpage");
                    params[WacEntity.jqGridMetas.rows]         = $(listingTableId).jqGrid('getGridParam',"rowNum");
                    params[WacEntity.jqGridMetas.sortName]     = $(listingTableId).jqGrid('getGridParam',"sortname");
                    params[WacEntity.jqGridMetas.sortOrder]    = $(listingTableId).jqGrid('getGridParam',"sortorder");
                    $.shout(WacAppConfig.event.app_wac_events_show_data_export_form,params);
                });
            }

      });

    </script>
</div>
<?php OutputHelper::getInstance()->writeNote("{$moduleName}-{$listId}, end");?>