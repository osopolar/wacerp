<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$modulePrefixName = $invokeParams['contextInfo']['moduleName'].$invokeParams['attachInfo']['name'];
$moduleName = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName = $invokeParams['attachInfo']['name'];
$moduleListingTableId = WacModuleHelper::getListingTableId($moduleName, $moduleAttachName);
$moduleListId = WacModuleHelper::getListId($moduleName, $moduleAttachName);
$moduleListPagerId = WacModuleHelper::getPagerId($moduleName, $moduleAttachName);
?>
<div id="<?php echo $moduleListingTableId; ?>">

    <div style="font-size:12px;"></div>

    <table id="<?php echo $moduleListId; ?>"></table>
    <div id="<?php echo $moduleListPagerId; ?>" ></div>

    <script type="text/javascript">
        //<![CDATA[
        

        $("#<?php echo $moduleListId; ?>").jqGrid({
            datatype: "json",
            url: WacAppConfig.baseUrl+"<?php echo $moduleName; ?>/getList",
            editurl: "<?php echo $moduleName; ?>/doOperation",
            postData: {dataFormat: "json"},
            colNames:['id', 
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
             jsonReader : {
                 root:"items",
                 page: "currentPage",
                 total: "totalPages",
                 records: "totalRecords",
                 userdata: "userdata",
                 id: "id",
                 repeatitems: false
             },
             rowNum:10,
             rowList:[10,20,30,40,50],
             sortname: 'id',
             sortorder: "desc",
             multiselect: false,
             viewrecords: true,
             pager: '#<?php echo $moduleListPagerId; ?>',
             caption:"<?php echo WacModule::getCaption($invokeParams["contextInfo"]["moduleName"]).__("List"); ?>",
             height: '100%',
             width: '100%',

             gridComplete: function(){
                 var ids = $("#<?php echo $moduleListId; ?>").jqGrid('getDataIDs');
                 var editUrl = WacAppConfig.baseUrl + "<?php echo $moduleName, $moduleAttachName; ?>/edit";
                 var delUrl = WacAppConfig.baseUrl + "<?php echo $moduleName, $moduleAttachName; ?>/delete";
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
                alert("Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText);
            },

            loadComplete: function()
            {
                //        Wac.log($.dump($("#<?php echo $moduleListId; ?>").jqGrid('getGridParam', 'userData')));
                //        Wac.log("loadComplete");
                $(this).trigger("tabsload");   // inform tabs event listener
            }

        }); // grid end

    $("#<?php echo $moduleListId; ?>").jqGrid('navGrid','#<?php echo $moduleListPagerId; ?>',
    {edit:false, add:false, del:false, search:true, refresh:true, view:false, position:"left"},
    {afterSubmit: <?php echo $modulePrefixName; ?>CallbackValidate, afterComplete: <?php echo $modulePrefixName; ?>CallbackEdit},
    {afterSubmit: <?php echo $modulePrefixName; ?>CallbackValidate, afterComplete: <?php echo $modulePrefixName; ?>CallbackAdd},
    {afterComplete: <?php echo $modulePrefixName; ?>CallbackDel},
    {afterComplete: <?php echo $modulePrefixName; ?>CallbackSearch},
    {afterComplete: <?php echo $modulePrefixName; ?>CallbackView});

    function <?php echo $modulePrefixName; ?>CallbackValidate(response, postdata){
    //    Wac.log("CallbackValidate");
    }

    function <?php echo $modulePrefixName; ?>CallbackSave(response){
    //    Wac.log("callbackSave");
    }

    function <?php echo $modulePrefixName; ?>CallbackEdit()
    {
    //    Wac.log("callbackEdit");
    }

    function <?php echo $modulePrefixName; ?>CallbackAdd()
    {
    //    Wac.log("callbackAdd");
    }

    function <?php echo $modulePrefixName; ?>CallbackDel()
    {
    //    Wac.log("callbackDel");
    }

    function <?php echo $modulePrefixName; ?>CallbackSearch()
    {
    //    Wac.log("callbackSearch");
    }

    function <?php echo $modulePrefixName; ?>CallbackView()
    {
    //    Wac.log("callbackView");
    }

    function <?php echo $modulePrefixName; ?>FormValidate(postdata, formid)
    {
        //    Wac.log("FormValidate");
    }

    function <?php echo $modulePrefixName; ?>FormValidateCallBack(jsonData)
    {
        //    Wac.log("FormValidateCallBack");
    }
 //]]>
 </script>
</div>