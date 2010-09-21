<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 * "wac_guard_user"
 */
?>
<div id="<?php echo WacModuleHelper::getListingTableId($invokeParams['moduleName']);?>">

    <div style="font-size:12px;"></div>
    <br />

    <table id="<?php echo WacModuleHelper::getListId($invokeParams['moduleName']); ?>"></table>
    <div id="<?php echo WacModuleHelper::getPagerId($invokeParams['moduleName']); ?>" ></div>

    <script type="text/javascript">
        //<![CDATA[
        jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']); ?>").jqGrid({
            datatype: "json",
            url: BASE_URL+"<?php echo $invokeParams['moduleName']; ?>/getList",
            editurl: "<?php echo $invokeParams['moduleName']; ?>/doOperation",
            postData: {dataFormat: "json"},
            colNames:['id', '用户名', '用户组', '状态', '建立时间',
                
       <?php
            echo WacModuleHelper::generateJqGridHiddenFields($invokeParams['objMainModuleTableFields']);
       ?>
                '操作' ],
            colModel:[
                {
                    name:'id',
                    index:'id',
                    editable:false,
                    width:30
                },
                {
                    name:'username',
                    index:'username',
                    editable:true,
                    formoptions:{elmsuffix:"(*)"},
                    editrules:{required:true},
                    width:100,
                    align:"left"
                },
                {
                    name:'groups_names',
                    index:'groups_names',
                    editable:false,
                    width:350,
                    align:"center"
                },
                {
                    name:'status',
                    index:'status',
                    align:"center",
                    editable:true,
                    width:100
                },
                {
                    name:'created_at',
                    index:'created_at',
                    sorttype:'date',
                    datefmt:'Y-m-d',
                    width:150,
                    editable:false,
                    align:"center"
                },

     <?php
            echo WacModuleHelper::generateJqGridHiddenFields($invokeParams['objMainModuleTableFields'], true);
     ?>
                
                {
                    name:'act',
                    index:'act',
                    width:100,
                    editable:false,
                    sortable:false,
                    align:"center"
                }
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
            pager: '#<?php echo WacModuleHelper::getPagerId($invokeParams['moduleName']); ?>',
            caption:"<?php echo $invokeParams['caption']; ?>列表",
            height: '100%',
            width: '100%',

            gridComplete: function(){
                var ids = jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']); ?>").jqGrid('getDataIDs');
                var editUrl = BASE_URL + "<?php echo $invokeParams['moduleName']; ?>/edit";
                var delUrl = BASE_URL + "<?php echo $invokeParams['moduleName']; ?>/delete";
                for(var i=0;i < ids.length;i++){
                    var cl = ids[i];
                    <?php echo WacModuleHelper::generateListViewFormBtn($invokeParams['moduleName']);?>     // bv
                    <?php echo WacModuleHelper::generateListAuditFormBtn($invokeParams['moduleName']);?>    // ba
                    <?php echo WacModuleHelper::generateListAddSubFormBtn($invokeParams['subItemModuleName']);?>    // sa
                    <?php echo WacModuleHelper::generateListEditFormBtn($invokeParams['moduleName']);?>    // be
                    <?php echo WacModuleHelper::generateListDelFormBtn($invokeParams['moduleName']);?>    // de

                    <?php echo WacModuleHelper::generateListBtns($invokeParams['moduleName'], $invokeParams['subItemModuleName'], $invokeParams['attachName'], array('be','de'));?>
                }
            },

            loadError : function(xhr,st,err){
                alert("Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText);
            },

            loadComplete: function()
            {
                //        console.log($.dump($("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']); ?>").jqGrid('getGridParam', 'userData')));
                //        console.log("loadComplete");
                $(this).trigger("tabsload");   // inform tabs event listener
            }

         }); // grid end

        jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']); ?>").jqGrid('navGrid','#<?php echo WacModuleHelper::getPagerId($invokeParams['moduleName']); ?>',
                        {edit:false, add:false, del:false, search:true, refresh:true, view:false, position:"left"},
                        {afterSubmit: <?php echo $invokeParams['moduleName']; ?>CallbackValidate, afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackEdit},
                        {afterSubmit: <?php echo $invokeParams['moduleName']; ?>CallbackValidate, afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackAdd},
                        {afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackDel},
                        {afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackSearch},
                        {afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackView});

        function <?php echo $invokeParams['moduleName']; ?>CallbackValidate(response, postdata){
                            //    console.log("callbackEdit");

                            wacAjaxData.response = eval('(' + response.responseText + ')');
                            //    console.log($.dump(wacAjaxData.response));
                            //    console.log($.dump(postdata));

                            if(wacAjaxData.response.userdata.status == wacOperationStatus.Succss)
                            {
                                return [true, "", ""];
                            }
                            else
                            {
                                return [false, wacAjaxData.response.userdata.error_info];
                            }
                        }

        function <?php echo $invokeParams['moduleName']; ?>CallbackSave(response){
                            //    alert("callbackSave");
                            //    console.log("callbackSave");
                            //    console.log($.dump($("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']); ?>").jqGrid('getGridParam', 'userData')));
                            //    console.log(response.responseText);
                            wacAjaxData.response = eval('(' + response.responseText + ')');
                            if(wacAjaxData.response.userdata.status == wacOperationStatus.Succss)
                            {
                                return true;
                            }
                            else
                            {
                                showTips(wacAjaxData.response.userdata.error_info);
                                return [false, wacAjaxData.response.userdata.error_info];
                            }
                        }

        function <?php echo $invokeParams['moduleName']; ?>CallbackEdit()
        {
            //    alert("callbackEdit");
            //    console.log("callbackEdit");
        }

        function <?php echo $invokeParams['moduleName']; ?>CallbackAdd()
        {
            //    alert("callbackAdd");
            //    console.log("callbackAdd");
        }

        function <?php echo $invokeParams['moduleName']; ?>CallbackDel()
        {
            //    alert("callbackDel");
            //    console.log("callbackDel");
        }

        function <?php echo $invokeParams['moduleName']; ?>CallbackSearch()
        {
            //    alert("callbackSearch");
            //    console.log("callbackSearch");
        }

        function <?php echo $invokeParams['moduleName']; ?>CallbackView()
        {
            //    alert("callbackView");
            //    console.log("callbackView");
        }

        function <?php echo $invokeParams['moduleName']; ?>FormValidate(postdata, formid)
        {
            $result = [];
            $.getJSON(
            BASE_URL+"<?php echo $invokeParams['moduleName']; ?>/validate",
            postdata,
            function(jsonData){
                wacOperationStatus.Processing = true;
<?php echo $invokeParams['moduleName']; ?>FormValidateCallBack(jsonData);
        }
    );

        $(".loading").css("display", "block");

        if(wacAjaxData.response.userdata.status == wacOperationStatus.Succss)
        {
            return [true];
        }
        else
        {
            return [false, wacAjaxData.response.userdata.error_info];
        }

        //    console.log($.dump(postdata));

    }

    function <?php echo $invokeParams['moduleName']; ?>FormValidateCallBack(jsonData)
    {
        wacAjaxData.response = jsonData;
        wacOperationStatus.Processing = false;
        $(".loading").css("display", "none");
        //    console.log($.dump(jsonData));
    }
    //]]>
    </script>

    <br /><br />

</div>