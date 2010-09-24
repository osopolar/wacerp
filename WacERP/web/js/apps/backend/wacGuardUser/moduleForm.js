/*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

/********   Notes:  *******
 *  Two tags need to be replaced with the module name, they are:
 *  wacGuardUser
 *  WacGuardUser
 *  wac_guard_user
 */



/***** variables declartion section, begin *****/
var wacGuardUserInputMode = wacFormInputMode.add;
var wacGuardUserObj = {};

/***** variables declartion section, end *****/

/***** init section, begin *****/
$(document).ready(
    function() {
        initWacGuardUserFormDialog();

        initWacGuardUserForm();

        bindWacGuardUserEvents();
    }
);

function bindWacGuardUserEvents()
{
    $("#wacGuardUserFormDialog").bind('dialogopen', function(event, ui)
    {
        initWacGuardUserFormData();
//        Wac.log("calling " + moduleName + ":" + wacModelObj.wacGuardUser.name);//
    });

    $("#wacGuardUserFormDialog").bind('dialogclose', function(event, ui)
    {
        $.validationEngine.closePrompt(".formError", true);
    });

    $("#wacGuardUser_btnSubmit").bind('click', function (e)
    {
        submitWacGuardUserForm();
    });

    $("#wacGuardUser_btnClose").bind('click', function (e)
    {
        $("#wacGuardUserFormDialog").dialog('close');
    });

    // fix dialog div didnt remove bug, remove it by this way
    $('#appStorehouseRightPane').bind('tabsremove', function(event, ui) {
        if(ui.panel.id == "t2300")
        {
            $("div[aria-labelledby='ui-dialog-title-wacGuardUserFormDialog']").remove();
            $("#wacGuardUserFormDialog").remove();
        }
    });
}


function initWacGuardUserFormDialog()
{
//    Wac.log("initWacGuardUserFormDialog.");
    $("#wacGuardUserFormDialog").dialog({
            bgiframe: true,
            modal: true,
            width: 850,
            height: 480,
            autoOpen: false,
            buttons: {},
            zIndex: 100
        });
}

function initWacGuardUserForm()
{
    $("#wacGuardUserForm").validationEngine();

    $('.wacFormContent .left, .wacFormContent input, .wacFormContent textarea, .wacFormContent select').focus(function(){
        $(this).parents('.wacFormContent').addClass("wacFormOver");
    }).blur(function(){
        $(this).parents('.wacFormContent').removeClass("wacFormOver");
    });
    
    $('.wacFormContentA .left, .wacFormContentA input, .wacFormContentA textarea, .wacFormContentA select').focus(function(){
        $(this).parents('.wacFormRow').addClass("wacFormOver");
    }).blur(function(){
        $(this).parents('.wacFormRow').removeClass("wacFormOver");
    });

    
}

function initWacGuardUserFormData()
{
    $(document).wacPage().showBlockUILoading("#wacGuardUserFormDialog");
    $('#wacGuardUser_sf_guard_user_group_list').empty();

    if(wacGuardUserInputMode == wacFormInputMode.add)   // use default values
    {
        var params = {
            "data_format" :'json'
        };
    }
    else
    {
        var params = {
            "data_format" :'json',
            "id" : wacGuardUserObj.id
        };
    }
    

    $.ajax({
        url: BASE_URL + "wacGuardUser/getFormData",
        global: true,
        type: "GET",
        data: params,
        dataType: "json",
        success: function(jsonData){
            initWacGuardUserFormDataCallBack(jsonData);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            Wac.log("getFormData Error: " + $(this).dump()); // the options for this ajax request
        }
    });
}

function initWacGuardUserFormDataCallBack(jsonData)
{
   if(jsonData.info.status == wacOperationStatus.Error)
   {
       alert(jsonData.info.error_info);
   }
   else
    {
        for(i=0;i<jsonData['items']['group'].length;i++)
        {
            $('<option value="' + jsonData['items']['group'][i].key +'">' + jsonData['items']['group'][i].value +'</option>').appendTo("#wacGuardUser_sf_guard_user_group_list");
        }

        for(i=0;i<jsonData['items']['user_group'].length;i++)
        {
            $("#wacGuardUser_sf_guard_user_group_list option[value='"+jsonData['items']['user_group'][i]+"']").attr("selected", true);
        }
   }

   setupWacGuardUserFormDefaultValues(jsonData['items']['default']);

   wacHideBlockUI("#wacGuardUserFormDialog");

//   Wac.log($.dump(jsonData));
}

function setupWacGuardUserFormDefaultValues(defaultValueObj)
{
    if(wacGuardUserInputMode == wacFormInputMode.add)   // use default values
    {
        $("#wacGuardUser_id").attr("value", 0);
    }
    else  // use edit obj values
    {
        $("#wacGuardUser_id").attr("value", wacGuardUserObj.id);
        $("#wacGuardUser_username").attr("value", wacGuardUserObj.username);
        $("#wacGuardUser_password").attr("value", "000000");
        $("#wacGuardUser_password_confirm").attr("value", "000000");

        $("#wacGuardUser_is_active").attr("checked", (wacGuardUserObj.is_active=='true'));
    }

//    Wac.log($.dump(wacGuardUserObj));
//    Wac.log($.dump(defaultValueObj));
//    Wac.log("wacGuardUserInputMode: " + wacGuardUserInputMode);

}
/***** init section, end *****/


/**************  interaction section, begin  ***************/

function wacGuardUserOpenModuleForm(moduleFormName, moduleName, inputMode, rowid)
{
    wacGuardUserInputMode = inputMode;

    if(rowid === undefined){
        wacGuardUserObj = {};
    }
    else
    {
        wacGuardUserObj = $("#" + moduleName +"List").getRowData(rowid);
    }

    $('#'+moduleFormName).dialog('open');
}

function validateWacGuardUserForm()
{
    var validateFlag = true;
    
    if (!$("#wacGuardUserForm").validationEngine({returnIsValid:true}))
    {
        validateFlag = false;
        return validateFlag;
    }

    if($("#wacGuardUser_password").val() != $("#wacGuardUser_password_confirm").val())
    {
        wacShowTips("请确认输入密码是否一致!");
        validateFlag = false;
    }

    if($("#wacGuardUser_sf_guard_user_group_list :selected").length == 0)
    {
        wacShowTips("请选择至少一个用户组!");
        validateFlag = false;
    }
    
    return validateFlag;
}

function submitWacGuardUserForm()
{
    if(!validateWacGuardUserForm()){
        return;
    }

    $(document).wacPage().showBlockUILoading("#wacGuardUserFormDialog", "处理中...");

    var extraParams = "data_format=json";
    var submitUrl;

    if(wacGuardUserInputMode == wacFormInputMode.add){
        submitUrl = BASE_URL + "wacGuardUser/add";
    }
    else{
        submitUrl = BASE_URL + "wacGuardUser/edit";
    }


    $.ajax({
        url: submitUrl,
//        url: BASE_URL + "test/ajaxTest" ,
        global: true,
        type: "GET",
        data: $("#wacGuardUserForm").serialize() + "&" + extraParams,
        dataType: "json",
        success: function(jsonData){
            submitWacGuardUserFormCallBack(jsonData);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            Wac.log("getFormData Error: " + $(this).dump()); // the options for this ajax request
        }
    });
}

function submitWacGuardUserFormCallBack(jsonData)
{
   if(jsonData.info.status == wacOperationStatus.Error)
   {
       wacShowTips(jsonData.info.error_info);
   }
   else
   {
       wacShowTips(jsonData.info.tips);
       $("#wacGuardUserList").trigger("reloadGrid");
   }

   wacHideBlockUI("#wacGuardUserFormDialog");

//   Wac.log($.dump(jsonData));
}

/**************  interaction section, end  ***************/