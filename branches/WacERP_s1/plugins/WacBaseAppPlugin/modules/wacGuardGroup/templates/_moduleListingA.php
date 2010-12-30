<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 * "wac_guard_group"
 */
?>
<div id="<?php echo WacModuleHelper::getListingTableId($invokeParams['contextInfo']['moduleName']);?>">

    <div style="font-size:12px;"></div>
    <br />

    <table id="<?php echo WacModuleHelper::getListId($invokeParams['contextInfo']['moduleName']); ?>"></table>
    <div id="<?php echo WacModuleHelper::getPagerId($invokeParams['contextInfo']['moduleName']); ?>" ></div>

    <script type="text/javascript">
        //<![CDATA[
        jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['contextInfo']['moduleName']); ?>").jqGrid({
            datatype: "json",
            url: BASE_URL+"<?php echo $invokeParams['contextInfo']['moduleName']; ?>/getList",
            editurl: "<?php echo $invokeParams['contextInfo']['moduleName']; ?>/doOperation",
            postData: {dataFormat: "json"},
            colNames:['id', '编码', '名称', '权限列表', '建立时间',
                
       <?php
            echo WacModuleHelper::generateJqGridHiddenFields($invokeParams['arrMainModuleTableFields']);
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
                    name:'name',
                    index:'name',
                    editable:true,
                    formoptions:{elmsuffix:"(*)"},
                    editrules:{required:true},
                    width:100,
                    align:"left"
                },
                {
                    name:'description',
                    index:'description',
                    editable:false,
                    width:200,
                    align:"center"
                },
                {
                    name:'permissions_names',
                    index:'permissions_names',
                    align:"center",
                    editable:true,
                    width:450
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
            echo WacModuleHelper::generateJqGridHiddenFields($invokeParams['arrMainModuleTableFields'], true);
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
            pager: '#<?php echo WacModuleHelper::getPagerId($invokeParams['contextInfo']['moduleName']); ?>',
            caption:"<?php echo WacModule::getCaption($invokeParams["contextInfo"]["moduleName"]); ?>列表",
            height: '100%',
            width: '100%',

            gridComplete: function(){
                var ids = jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['contextInfo']['moduleName']); ?>").jqGrid('getDataIDs');
                var editUrl = BASE_URL + "<?php echo $invokeParams['contextInfo']['moduleName']; ?>/edit";
                var delUrl = BASE_URL + "<?php echo $invokeParams['contextInfo']['moduleName']; ?>/delete";
                for(var i=0;i < ids.length;i++){
                    var cl = ids[i];
                    <?php echo WacModuleHelper::generateListViewFormBtn($invokeParams['contextInfo']['moduleName']);?>     // bv
                    <?php echo WacModuleHelper::generateListAuditFormBtn($invokeParams['contextInfo']['moduleName']);?>    // ba
                    <?php echo WacModuleHelper::generateListAddSubFormBtn($invokeParams['subItemModuleName']);?>    // sa
                    <?php echo WacModuleHelper::generateListEditFormBtn($invokeParams['contextInfo']['moduleName']);?>    // be
                    <?php echo WacModuleHelper::generateListDelFormBtn($invokeParams['contextInfo']['moduleName']);?>    // de

                    <?php echo WacModuleHelper::generateListBtns($invokeParams['contextInfo']['moduleName'], $invokeParams['subItemModuleName'], $invokeParams['attachInfo']['name'], array('be','de'));?>
                }
            },

            loadError : function(xhr,st,err){
                alert("Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText);
            },

            loadComplete: function()
            {
                //        Wac.log($.dump($("#<?php echo WacModuleHelper::getListId($invokeParams['contextInfo']['moduleName']); ?>").jqGrid('getGridParam', 'userData')));
                //        Wac.log("loadComplete");
                $(this).trigger("tabsload");   // inform tabs event listener
            }

         }); // grid end

        jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['contextInfo']['moduleName']); ?>").jqGrid('navGrid','#<?php echo WacModuleHelper::getPagerId($invokeParams['contextInfo']['moduleName']); ?>',
                        {edit:false, add:false, del:false, search:true, refresh:true, view:false, position:"left"},
                        {afterSubmit: <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackValidate, afterComplete: <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackEdit},
                        {afterSubmit: <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackValidate, afterComplete: <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackAdd},
                        {afterComplete: <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackDel},
                        {afterComplete: <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackSearch},
                        {afterComplete: <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackView});

        function <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackValidate(response, postdata){
                            //    Wac.log("callbackEdit");

                            wacAjaxData.response = eval('(' + response.responseText + ')');
                            //    Wac.log($.dump(wacAjaxData.response));
                            //    Wac.log($.dump(postdata));

                            if(wacAjaxData.response.userdata.status == wacOperationStatus.Succss)
                            {
                                return [true, "", ""];
                            }
                            else
                            {
                                return [false, wacAjaxData.response.userdata.error_info];
                            }
                        }

        function <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackSave(response){
                            //    alert("callbackSave");
                            //    Wac.log("callbackSave");
                            //    Wac.log($.dump($("#<?php echo WacModuleHelper::getListId($invokeParams['contextInfo']['moduleName']); ?>").jqGrid('getGridParam', 'userData')));
                            //    Wac.log(response.responseText);
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

        function <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackEdit()
        {
            //    alert("callbackEdit");
            //    Wac.log("callbackEdit");
        }

        function <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackAdd()
        {
            //    alert("callbackAdd");
            //    Wac.log("callbackAdd");
        }

        function <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackDel()
        {
            //    alert("callbackDel");
            //    Wac.log("callbackDel");
        }

        function <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackSearch()
        {
            //    alert("callbackSearch");
            //    Wac.log("callbackSearch");
        }

        function <?php echo $invokeParams['contextInfo']['moduleName']; ?>CallbackView()
        {
            //    alert("callbackView");
            //    Wac.log("callbackView");
        }

        function <?php echo $invokeParams['contextInfo']['moduleName']; ?>FormValidate(postdata, formid)
        {
            $result = [];
            $.getJSON(
            BASE_URL+"<?php echo $invokeParams['contextInfo']['moduleName']; ?>/validate",
            postdata,
            function(jsonData){
                wacOperationStatus.Processing = true;
<?php echo $invokeParams['contextInfo']['moduleName']; ?>FormValidateCallBack(jsonData);
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

        //    Wac.log($.dump(postdata));

    }

    function <?php echo $invokeParams['contextInfo']['moduleName']; ?>FormValidateCallBack(jsonData)
    {
        wacAjaxData.response = jsonData;
        wacOperationStatus.Processing = false;
        $(".loading").css("display", "none");
        //    Wac.log($.dump(jsonData));
    }
    //]]>
    </script>

    <br /><br />

</div>