<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$modulePrefixName = $invokeParams['contextInfo']['moduleName'] . $invokeParams['attachInfo']['name'];
$moduleName = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName = $invokeParams['attachInfo']['name'];
$moduleListingTableId = WacModuleHelper::getListingTableId($moduleName, $moduleAttachName);
$moduleListId = WacModuleHelper::getListId($moduleName, $moduleAttachName);
$moduleListPagerId = WacModuleHelper::getPagerId($moduleName, $moduleAttachName);

?>


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

            $(document).hear(moduleListId, modulePrefixId + WacAppConfig.event.app_wac_events_data_export, function ($self, data) {  // listenerid, event name, callback
//                var params = $.extend({dataFormat :WacEntity.extraParam.dataFormat}, data);
//                params.searchField = "name";  // this is a special case, for the name is code on table guardgroup
//                $(moduleListId).jqGrid('setGridParam',{postData:params});
//                $(moduleListId).trigger("reloadGrid");
                var params = "";
                params = $(moduleListId).getGridParam("editurl");
                Wac.log(params);
                params = $(moduleListId).getGridParam("url");
                Wac.log(params);
                params = $(moduleListId).getGridParam("postData");
                Wac.log(params);
            });

            $(moduleListId).jqGrid({
                  datatype: WacEntity.extraParam.dataFormat,
                  url: WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/getList",
                  editurl: WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/doOperation/dataFormat/"+WacEntity.extraParam.dataFormat,
                  postData: WacEntity.extraParam,
                  colNames:[
                      'id',
                      '<?php echo __("Name"); ?>',
                      '<?php echo __("Coding"); ?>',
                      '<?php echo __("Remark"); ?>',
                      '<?php echo __("Create Time"); ?>',
                      '<?php echo __("Action"); ?>'
                  ],
                  colModel:[
                      {name:'id', index:'id', editable:false, width:25},
                      {name:'name', index:'name', editable:true, formoptions:{elmsuffix:"(*)"}, editrules:{required:true}, width:250},
                      {name:'code', index:'code', editable:true, formoptions:{elmsuffix:"(*)"}, editrules:{required:true}, width:120, align:"left"},
                      {name:'memo', index:'memo', editable:true, width:150, edittype:"textarea", editoptions:{rows:"2",cols:"10"}, align:"center"},
                      {name:'created_at', index:'created_at', sorttype:'date', datefmt:'Y-m-d', width:150, editable:false, align:"center"},
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
                  caption:"<?php echo WacModule::getCaption($moduleName) . __("List"); ?>",
                  height: '100%',
                  width: '100%',

                  gridComplete: function(){
                      var ids = $(moduleListId).jqGrid('getDataIDs');
                      var editUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/edit";
                      var delUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/delete";
                      for(var i=0;i < ids.length;i++){
                          var cl = ids[i];
                          be = "<input style='height:22px;width:28px;' type='button' value='编' onclick=\"$('#<?php echo $moduleListId; ?>').jqGrid('editRow','"+cl+"', true, null, <?php echo $modulePrefixName; ?>Callback.save, '" + editUrl + "', WacEntity.extraParam);\" />";
                          se = "<input style='height:22px;width:28px;' type='button' value='存' onclick=\"$('#<?php echo $moduleListId; ?>').jqGrid('saveRow', '"+cl+"', <?php echo $modulePrefixName; ?>Callback.save, '" + editUrl + "', WacEntity.extraParam, null);\" />";
                          ce = "<input style='height:22px;width:28px;' type='button' value='消' onclick=\"$('#<?php echo $moduleListId; ?>').jqGrid('restoreRow', '"+cl+"');\" />";
                          de = "<input style='height:22px;width:28px;' type='button' value='删' onclick=\"$('#<?php echo $moduleListId; ?>').jqGrid('delGridRow', '"+cl+"', {url:'" + delUrl + "', top: 200, left:500});\" />";
                          $(moduleListId).jqGrid('setRowData',ids[i],{
                              act:be+se+ce+de
                          });
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

            });

//          define a callback object to handle the callback, optional for this table
            <?php echo $modulePrefixName; ?>Callback = new WacJqGridCallback("<?php echo $modulePrefixName; ?>");

            $(moduleListId).jqGrid('navGrid',moduleListPagerId,
                {edit:true, add:true, del:true, search:true, refresh:true, view:true, position:"left"},
                {afterSubmit: <?php echo $modulePrefixName; ?>Callback.validate, afterComplete: <?php echo $modulePrefixName; ?>Callback.edit},
                {afterSubmit: <?php echo $modulePrefixName; ?>Callback.validate, afterComplete: <?php echo $modulePrefixName; ?>Callback.add},
                {afterComplete: <?php echo $modulePrefixName; ?>Callback.del},
                {afterComplete: <?php echo $modulePrefixName; ?>Callback.search},
                {afterComplete: <?php echo $modulePrefixName; ?>Callback.view}
            );
      });

    </script>
</div>