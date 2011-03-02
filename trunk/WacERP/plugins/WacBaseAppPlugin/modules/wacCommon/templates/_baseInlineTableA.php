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

$modulePrefixName     = $invokeParams['contextInfo']['moduleName'] . $invokeParams['attachInfo']['name'];
$moduleName           = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName     = $invokeParams['attachInfo']['name'];
$moduleListingTableId = WacModuleHelper::getListingTableId($moduleName, $moduleAttachName);
$moduleListId         = WacModuleHelper::getListId($moduleName, $moduleAttachName);
$moduleListPagerId    = WacModuleHelper::getPagerId($moduleName, $moduleAttachName);
$moduleCaption        = WacModule::getInstance()->getCaption($moduleName) . __("List");
?>

<?php OutputHelper::getInstance()->writeNote("{$moduleName}-{$moduleListingTableId}, begin");?>
<div id="<?php echo $moduleListingTableId; ?>">
    <table id="<?php echo $moduleListId; ?>"></table>
    <div id="<?php echo $moduleListPagerId; ?>" ></div>

    <script type="text/javascript">

      $("#<?php echo $moduleListingTableId; ?>").ready(function(){
            var moduleName = <?php echo "'{$moduleName}'" ?>;
            var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
            var modulePrefixId   = '#' + modulePrefixName;
            var moduleListId     = '#' + <?php echo "'{$moduleListId}'" ?>;
            var moduleListPagerId= '#' + <?php echo "'{$moduleListPagerId}'" ?>;
            var moduleCaption    = <?php echo "'{$moduleCaption}'" ?>;
            var toolbarSearchField = <?php echo "'{$contextInfo["toolbarSearchField"]}'" ?>;

            //  define a callback object to handle the callback, optional for this table
            <?php echo $modulePrefixName; ?>Callback = new WacJqGridCallback("<?php echo $modulePrefixName; ?>");

            init();
            bindEvents();

            function init(){
                var lastSelectId;
                $(moduleListId).jqGrid({
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
                      pager: moduleListPagerId,
                      caption:"<?php echo WacModule::getInstance()->getCaption($moduleName) . __("List"); ?>",
                      height: '100%',
                      width: '100%',

                      gridComplete: function(){
                          var ids = $(moduleListId).jqGrid('getDataIDs');
                          var editUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/edit";
                          var delUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/delete";
                          for(var i=0;i < ids.length;i++){
                              var cl = ids[i];
                              <?php
                                echo WacModuleHelper::generateListBtns($moduleName, $invokeParams['subItemModuleName'], $moduleAttachName, $contextInfo["operatorBtns"], true);
                              ?>
                          }
                      },

                      onSelectRow: function(id){
                          if(id && id!==lastSelectId){
                             $(moduleListId).jqGrid('restoreRow',lastSelectId);
                             lastSelectId=id;
                          }
                      },

                      loadError : function(xhr,st,err){
                          Wac.log("Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText);
                      },

                      loadComplete: function()
                      {
    //                    Wac.log(modulePrefixName + "loadComplete");
                          $(this).trigger("tabsload");   // inform tabs event listener
                      }

                });  // grid end

                $(moduleListId).jqGrid('navGrid',moduleListPagerId,
                    {edit:true, add:true, del:true, search:true, refresh:true, view:true, position:"left"},
                    {afterSubmit: <?php echo $modulePrefixName; ?>Callback.validate, afterComplete: <?php echo $modulePrefixName; ?>Callback.edit},
                    {afterSubmit: <?php echo $modulePrefixName; ?>Callback.validate, afterComplete: <?php echo $modulePrefixName; ?>Callback.add},
                    {afterComplete: <?php echo $modulePrefixName; ?>Callback.del},
                    {afterComplete: <?php echo $modulePrefixName; ?>Callback.search},
                    {afterComplete: <?php echo $modulePrefixName; ?>Callback.view}
                );
            };  // init end

            function bindEvents(){
                // listen add event
                $(document).hear(moduleListId, modulePrefixId + WacAppConfig.event.app_wac_events_show_add_form, function ($self, data) {  // listenerid, event name, callback
                    $(moduleListId).jqGrid('editGridRow', "new", {});
                });

                // listen search event
                $(document).hear(moduleListId, modulePrefixId + WacAppConfig.event.app_wac_events_search_in_list, function ($self, data) {  // listenerid, event name, callback
                    var params = $.extend({dataFormat :WacEntity.extraParam.dataFormat}, data);
                    params.searchField = toolbarSearchField;  // this is a special case, for the name is code on table guardgroup
                    $(moduleListId).jqGrid('setGridParam',{postData:params});
                    $(moduleListId).trigger("reloadGrid");
    //                Wac.log(data);
                });

                $(document).hear(moduleListId, modulePrefixId + WacAppConfig.event.app_wac_events_data_print, function ($self, data) {  // listenerid, event name, callback
//                   Wac.log(data);
                    var params = {};
                    params.moduleName = moduleName;
                    params.moduleCaption = moduleCaption;
                    params.moduleAction  = "getList";
                    params.dataFormat    = "htmlTable";
                    
                    params[WacEntity.jqGridMetas.currentPage]  = $(moduleListId).jqGrid('getGridParam',"page");
                    params[WacEntity.jqGridMetas.totalPages]   = $(moduleListId).jqGrid('getGridParam',"lastpage");
                    params[WacEntity.jqGridMetas.rows]         = $(moduleListId).jqGrid('getGridParam',"rowNum");
                    params[WacEntity.jqGridMetas.sortName]     = $(moduleListId).jqGrid('getGridParam',"sortname");
                    params[WacEntity.jqGridMetas.sortOrder]    = $(moduleListId).jqGrid('getGridParam',"sortorder");
                    
                    $.shout(WacAppConfig.event.app_wac_events_show_data_print_form,params);
                });

                $(document).hear(moduleListId, modulePrefixId + WacAppConfig.event.app_wac_events_data_export, function ($self, data) {  // listenerid, event name, callback
                    var params = {};
                    params.moduleName = moduleName;
                    params.moduleCaption = moduleCaption;
                    
                    params[WacEntity.jqGridMetas.currentPage]  = $(moduleListId).jqGrid('getGridParam',"page");
                    params[WacEntity.jqGridMetas.totalPages]   = $(moduleListId).jqGrid('getGridParam',"lastpage");
                    params[WacEntity.jqGridMetas.rows]         = $(moduleListId).jqGrid('getGridParam',"rowNum");
                    params[WacEntity.jqGridMetas.sortName]     = $(moduleListId).jqGrid('getGridParam',"sortname");
                    params[WacEntity.jqGridMetas.sortOrder]    = $(moduleListId).jqGrid('getGridParam',"sortorder");
                    $.shout(WacAppConfig.event.app_wac_events_show_data_export_form,params);
                });
            }

      });

    </script>
</div>
<?php OutputHelper::getInstance()->writeNote("{$moduleName}-{$moduleListingTableId}, end");?>