<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$modulePrefixName     = $invokeParams['contextInfo']['moduleName'].$invokeParams['attachInfo']['name'];
$moduleName           = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName     = $invokeParams['attachInfo']['name'];
$moduleListingTableId = WacModuleHelper::getListingTableId($moduleName, $moduleAttachName);
$moduleListId         = WacModuleHelper::getListId($moduleName, $moduleAttachName);
$moduleListPagerId    = WacModuleHelper::getPagerId($moduleName, $moduleAttachName);

?>


<div id="<?php echo $moduleListingTableId; ?>">
    <table id="<?php echo $moduleListId; ?>"></table>
    <div id="<?php echo $moduleListPagerId; ?>" ></div>

    <script type="text/javascript">
        //<![CDATA[
        $(function(){
            var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
            var modulePrefixId   = '#' + modulePrefixName;
            var moduleListId     = '#' + <?php echo "'{$moduleListId}'" ?>;
            var moduleListPagerId= '#' + <?php echo "'{$moduleListPagerId}'" ?>;
            
            $(document).hear(moduleListId, modulePrefixId + WacAppConfig.event.app_wac_events_search_in_list, function ($self, data) {  // listenerid, event name, callback
                var params = $.extend({dataFormat :WacEntity.extraParam.dataFormat}, data);
                params.searchField = "name";  // this is a special case, for the name is code on table guardgroup
                $(moduleListId).jqGrid('setGridParam',{postData:params});
                $(moduleListId).trigger("reloadGrid");
//                Wac.log(data);
            });

            $(document).hear(moduleListId, modulePrefixId + WacAppConfig.event.app_wac_events_data_export, function ($self, data) {  // listenerid, event name, callback
                var params = "";
                params = $(moduleListId).jqGrid('getGridParam',"url");
                Wac.log(params);
                params = $(moduleListId).jqGrid('getGridParam',"page");
                Wac.log(params);
                params = $(moduleListId).jqGrid('getGridParam',"sortname");
                Wac.log(params);
                 params = $(moduleListId).jqGrid('getGridParam',"sortorder");
                Wac.log(params);
                 params = $(moduleListId).jqGrid('getGridParam',"rowNum");
                Wac.log(params);
//                 params = $(moduleListId).jqGrid('getGridParam',"searchField");
//                Wac.log(params)
//                params = $(moduleListId).jqGrid('getGridParam',"searchOper");
//                Wac.log(params);
//                params = $(moduleListId).jqGrid('getGridParam',"searchString");
//                Wac.log(params);
//                 params = $(moduleListId).jqGrid('getGridParam',"search");
//                Wac.log(params);
                params = $(moduleListId).getPostData();
                Wac.log(params);
            });
            
            $(moduleListId).jqGrid({
                datatype: WacEntity.extraParam.dataFormat,
                url: WacAppConfig.baseUrl+"<?php echo $moduleName; ?>/getList",
                editurl: WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/doOperation",
                postData: WacEntity.extraParam,
                colNames:[
                    'id',
                    '<?php echo __("Coding");?>',
                    '<?php echo __("Name");?>',
                    '<?php echo __("Remark");?>',
                    '<?php echo __("Create Time");?>',
                    <?php
                    echo WacModuleHelper::generateJqGridHiddenFields($invokeParams['arrMainModuleTableFields']);
                    ?>
                    '<?php echo __("Action");?>'
                ],
                colModel:[
                       {name:'id', index:'id', width:30},
                       {name:'name', index:'name', width:100, align:"left"},
                       {name:'description', index:'description', width:200, align:"center"},
                       {name:'permissions_names', index:'permissions_names', align:"center", sortable:false, width:450},
                       {name:'created_at', index:'created_at', sorttype:'date', datefmt:'Y-m-d', width:150, align:"center"},
                        <?php
                        echo WacModuleHelper::generateJqGridHiddenFields($invokeParams['arrMainModuleTableFields'], true);
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
                 pager: moduleListPagerId,
                 caption:"<?php echo WacModule::getCaption($moduleName).__("List"); ?>",
                 height: '100%',
                 width: '100%',

                 gridComplete: function(){
                     var ids = $(moduleListId).jqGrid('getDataIDs');
                     var editUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/edit";
                     var delUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/delete";
                     for(var i=0;i < ids.length;i++){
                         var cl = ids[i];
                        <?php echo WacModuleHelper::generateListViewFormBtn($moduleName, $moduleAttachName); ?>     // bv
                        <?php echo WacModuleHelper::generateListAuditFormBtn($moduleName, $moduleAttachName); ?>    // ba
                        <?php echo WacModuleHelper::generateListAddSubFormBtn($invokeParams['subItemModuleName']); ?>    // sa
                        <?php echo WacModuleHelper::generateListEditFormBtn($moduleName, $moduleAttachName); ?>    // be
                        <?php echo WacModuleHelper::generateListDelFormBtn($moduleName, $moduleAttachName); ?>    // de

                        <?php echo WacModuleHelper::generateListBtns($moduleName, $invokeParams['subItemModuleName'], $moduleAttachName, array('be', 'de')); ?>
                     }
                },

                loadError : function(xhr,st,err){
                    Wac.log("Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText);
                },

                loadComplete: function()
                {
                    //        Wac.log($.dump($(moduleListId).jqGrid('getGridParam', 'userData')));
                    //        Wac.log("loadComplete");
                    $(this).trigger("tabsload");   // inform tabs event listener
                }

            }); // grid end

//          define a callback object to handle the callback, optional for this table
            <?php echo $modulePrefixName; ?>Callback = new WacJqGridCallback("<?php echo $modulePrefixName; ?>");

            $(moduleListId).jqGrid('navGrid',moduleListPagerId,
            {edit:false, add:false, del:false, search:true, refresh:true, view:false, position:"left"},
            {afterSubmit: <?php echo $modulePrefixName; ?>Callback.validate, afterComplete: <?php echo $modulePrefixName; ?>Callback.edit},
            {afterSubmit: <?php echo $modulePrefixName; ?>Callback.validate, afterComplete: <?php echo $modulePrefixName; ?>Callback.add},
            {afterComplete: <?php echo $modulePrefixName; ?>Callback.del},
            {afterComplete: <?php echo $modulePrefixName; ?>Callback.search},
            {afterComplete: <?php echo $modulePrefixName; ?>Callback.view});
         })

     //]]>
     </script>
</div>