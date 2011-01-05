<div style="font-size:12px;"></div>
<br />

<table id="<?php echo WacModuleHelper::getListId($invokeParams['moduleName']); ?>"></table>
<div id="<?php echo WacModuleHelper::getPagerId($invokeParams['moduleName']); ?>" ></div>

<script type="text/javascript">
    //<![CDATA[
    jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']); ?>").jqGrid({
        datatype: "json",
        url: WacAppConfig.baseUrl+"<?php echo $invokeParams['moduleName']; ?>/getList",
        editurl: "<?php echo $invokeParams['moduleName']; ?>/doOperation",
        postData: {dataFormat: "json"},
        colNames:['id','名称', '编码', '备注','建立时间', '操作' ],
        colModel:[
            {name:'id', index:'id', editable:false, width:25},
            {name:'name', index:'name', editable:true, formoptions:{elmsuffix:"(*)"}, editrules:{required:true}, width:250},
            {name:'code', index:'code', editable:true, formoptions:{elmsuffix:"(*)"}, editrules:{required:true}, width:120, align:"left"},
            {name:'memo', index:'memo', editable:true, width:150, edittype:"textarea", editoptions:{rows:"2",cols:"10"}, align:"center"},
            {name:'created_at', index:'created_at', sorttype:'date', datefmt:'Y-m-d', width:150, editable:false, align:"center"},
            {name:'act', width:180, editable:false, sortable:false, align:"center"}
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
        multiselect: true,
        viewrecords: true,
        pager: '#<?php echo WacModuleHelper::getPagerId($invokeParams['moduleName']);?>',
        caption:"<?php echo $invokeParams['caption']; ?>列表",
        height: '100%',
        width: '100%',

        gridComplete: function(){
            var ids = jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']);?>").jqGrid('getDataIDs');
            var editUrl = WacAppConfig.baseUrl + "<?php echo $invokeParams['moduleName']; ?>/edit";
            var delUrl = WacAppConfig.baseUrl + "<?php echo $invokeParams['moduleName']; ?>/delete";
            for(var i=0;i < ids.length;i++){
                var cl = ids[i];
                be = "<input style='height:22px;width:28px;' type='button' value='编' onclick=\"jQuery('#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']);?>').jqGrid('editRow','"+cl+"', true, null, <?php echo $invokeParams['moduleName']; ?>CallbackSave, '" + editUrl + "');\" />";
                se = "<input style='height:22px;width:28px;' type='button' value='存' onclick=\"jQuery('#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']);?>').jqGrid('saveRow', '"+cl+"', <?php echo $invokeParams['moduleName']; ?>CallbackSave, '" + editUrl + "', {}, null);\" />";
                ce = "<input style='height:22px;width:28px;' type='button' value='消' onclick=\"jQuery('#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']);?>').jqGrid('restoreRow', '"+cl+"');\" />";
                de = "<input style='height:22px;width:28px;' type='button' value='删' onclick=\"jQuery('#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']);?>').jqGrid('delGridRow', '"+cl+"', {url:'" + delUrl + "', top: 200, left:500});\" />";
                jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']);?>").jqGrid('setRowData',ids[i],{
                    act:be+se+ce+de
                });
            }
        },

        loadError : function(xhr,st,err){
            alert("Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText);
        },

        loadComplete: function()
        {
            //        console.log($.dump($("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']);?>").jqGrid('getGridParam', 'userData')));
            //        console.log("loadComplete");
        }

    });
    jQuery("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']);?>").jqGrid('navGrid','#<?php echo WacModuleHelper::getPagerId($invokeParams['moduleName']);?>',
    {edit:true, add:true, del:true, search:true, refresh:true, view:true, position:"left"},
    {afterSubmit: <?php echo $invokeParams['moduleName']; ?>CallbackValidate, afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackEdit},
    {afterSubmit: <?php echo $invokeParams['moduleName']; ?>CallbackValidate, afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackAdd},
    {afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackDel},
    {afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackSearch},
    {afterComplete: <?php echo $invokeParams['moduleName']; ?>CallbackView}
);

    function <?php echo $invokeParams['moduleName']; ?>CallbackValidate(response, postdata)
    {
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

    function <?php echo $invokeParams['moduleName']; ?>CallbackSave(response)
    {
        //    alert("callbackSave");
        //    console.log("callbackSave");
        //    console.log($.dump($("#<?php echo WacModuleHelper::getListId($invokeParams['moduleName']);?>").jqGrid('getGridParam', 'userData')));
        //    console.log(response.responseText);
        wacAjaxData.response = eval('(' + response.responseText + ')');
        if(wacAjaxData.response.userdata.status == wacOperationStatus.Succss)
        {
            return true;
        }
        else
        {
            wacShowTips(wacAjaxData.response.userdata.error_info);
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
        WacAppConfig.baseUrl+"<?php echo $invokeParams['moduleName']; ?>/validate",
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