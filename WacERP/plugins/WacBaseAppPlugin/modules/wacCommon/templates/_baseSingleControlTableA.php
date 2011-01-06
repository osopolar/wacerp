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
        //<![CDATA[
        var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
        var modulePrefixId   = '#' + modulePrefixName;
        var moduleListId     = '#' + <?php echo "'{$moduleListId}'" ?>;
        var moduleListPagerId= '#' + <?php echo "'{$moduleListPagerId}'" ?>;

        $(moduleListId).jqGrid({
            datatype: "json",
            url: WacAppConfig.baseUrl+"<?php echo $moduleName; ?>/getList",
            editurl: "<?php echo $moduleName; ?>/doOperation",
            postData: {dataFormat: "json"},
            colNames:[
                    'id',
                    '<?php echo __("Coding");?>',
                    '<?php echo __("Name");?>',
                    '<?php echo __("Remark");?>',
                    '<?php echo __("Create Time");?>',
                    '<?php echo __("Action");?>'
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
            rowList:[10,20,30,40,50],
            sortname: 'id',
            sortorder: "desc",
            multiselect: true,
            viewrecords: true,
            pager: moduleListPagerId,
            caption:"<?php echo WacModule::getCaption($invokeParams["contextInfo"]["moduleName"]).__("List"); ?>",
            height: '100%',
            width: '100%',

            gridComplete: function(){
                var ids = $(moduleListId).jqGrid('getDataIDs');
                var editUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/edit";
                var delUrl = WacAppConfig.baseUrl + "<?php echo $moduleName; ?>/delete";
                for(var i=0;i < ids.length;i++){
                    var cl = ids[i];
                    be = "<input style='height:22px;width:28px;' type='button' value='编' onclick=\"$('#<?php echo $moduleListId; ?>').jqGrid('editRow','"+cl+"', true, null, <?php echo $modulePrefixName; ?>CallbackSave, '" + editUrl + "');\" />";
                    se = "<input style='height:22px;width:28px;' type='button' value='存' onclick=\"$('#<?php echo $moduleListId; ?>').jqGrid('saveRow', '"+cl+"', <?php echo $modulePrefixName; ?>CallbackSave, '" + editUrl + "', {}, null);\" />";
                    ce = "<input style='height:22px;width:28px;' type='button' value='消' onclick=\"$('#<?php echo $moduleListId; ?>').jqGrid('restoreRow', '"+cl+"');\" />";
                    de = "<input style='height:22px;width:28px;' type='button' value='删' onclick=\"$('#<?php echo $moduleListId; ?>').jqGrid('delGridRow', '"+cl+"', {url:'" + delUrl + "', top: 200, left:500});\" />";
                    $(moduleListId).jqGrid('setRowData',ids[i],{
                        act:be+se+ce+de
                    });
                }
            },

            loadError : function(xhr,st,err){
                alert("Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText);
            },

            loadComplete: function()
            {
                //        Wac.log($.dump($(moduleListId).jqGrid('getGridParam', 'userData')));
                //        Wac.log("loadComplete");
                $(this).trigger("tabsload");   // inform tabs event listener
            }

        });
        $(moduleListId).jqGrid('navGrid',moduleListPagerId,
        {edit:true, add:true, del:true, search:true, refresh:true, view:true, position:"left"},
        {afterSubmit: <?php echo $modulePrefixName; ?>CallbackValidate, afterComplete: <?php echo $modulePrefixName; ?>CallbackEdit},
        {afterSubmit: <?php echo $modulePrefixName; ?>CallbackValidate, afterComplete: <?php echo $modulePrefixName; ?>CallbackAdd},
        {afterComplete: <?php echo $modulePrefixName; ?>CallbackDel},
        {afterComplete: <?php echo $modulePrefixName; ?>CallbackSearch},
        {afterComplete: <?php echo $modulePrefixName; ?>CallbackView}
    );

        function <?php echo $modulePrefixName; ?>CallbackValidate(response, postdata)
        {
            //    Wac.log("callbackEdit");

            WacEntity.ajaxData.response = eval('(' + response.responseText + ')');
            //    Wac.log($.dump(WacEntity.ajaxData.response));
            //    Wac.log($.dump(postdata));

            if(WacEntity.ajaxData.response.userdata.status == WacEntity.operationStatus.succss)
            {
                return [true, "", ""];
            }
            else
            {
                return [false, WacEntity.ajaxData.response.userdata.error_info];
            }
        }

        function <?php echo $modulePrefixName; ?>CallbackSave(response)
        {
            //    alert("callbackSave");
            //    Wac.log("callbackSave");
            //    Wac.log($.dump($(moduleListId).jqGrid('getGridParam', 'userData')));
            //    Wac.log(response.responseText);
            WacEntity.ajaxData.response = eval('(' + response.responseText + ')');
            if(WacEntity.ajaxData.response.userdata.status == WacEntity.operationStatus.succss)
            {
                return true;
            }
            else
            {
                $(document).wacPage().showTips(WacEntity.ajaxData.response.userdata.error_info);
                return [false, WacEntity.ajaxData.response.userdata.error_info];
            }
        }

        function <?php echo $modulePrefixName; ?>CallbackEdit()
        {
            //    alert("callbackEdit");
            //    Wac.log("callbackEdit");
        }

        function <?php echo $modulePrefixName; ?>CallbackAdd()
        {
            //    alert("callbackAdd");
            //    Wac.log("callbackAdd");
        }

        function <?php echo $modulePrefixName; ?>CallbackDel()
        {
            //    alert("callbackDel");
            //    Wac.log("callbackDel");
        }

        function <?php echo $modulePrefixName; ?>CallbackSearch()
        {
            //    alert("callbackSearch");
            //    Wac.log("callbackSearch");
        }

        function <?php echo $modulePrefixName; ?>CallbackView()
        {
            //    alert("callbackView");
            //    Wac.log("callbackView");
        }

        function <?php echo $modulePrefixName; ?>FormValidate(postdata, formid)
        {
            $result = [];
            $.getJSON(
            WacAppConfig.baseUrl+"<?php echo $modulePrefixName; ?>/validate",
            postdata,
            function(jsonData){
                WacEntity.operationStatus.Processing = true;
<?php echo $modulePrefixName; ?>FormValidateCallBack(jsonData);
                        }
                    );

                        $(".loading").css("display", "block");

                        if(WacEntity.ajaxData.response.userdata.status == WacEntity.operationStatus.succss)
                        {
                            return [true];
                        }
                        else
                        {
                            return [false, WacEntity.ajaxData.response.userdata.error_info];
                        }

                    }

                    function <?php echo $modulePrefixName; ?>FormValidateCallBack(jsonData)
                    {
                        WacEntity.ajaxData.response = jsonData;
                        WacEntity.operationStatus.Processing = false;
                        $(".loading").css("display", "none");
                        //    Wac.log($.dump(jsonData));
                    }
                    //]]>
    </script>
</div>