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
    function(){
        if($.Storage.get("wacGuardUserForm") == null){
            Wac.log("::: ");
           $.Storage.set("wacGuardUserForm", "1");
            var wacGuardUserForm = new WacGuardUserForm();

            wacGuardUserForm.initDialog();
            wacGuardUserForm.initForm();
            wacGuardUserForm.bindEvents();

            $(document).hear("keyword-search", function ($self, data) {
                Wac.log($(document).wacTool().dumpObj(data));
            });
        }

        
//        initWacGuardUserFormDialog();
//
//        initWacGuardUserForm();
//
//        bindWacGuardUserEvents();
    }
);


WacGuardUserForm.prototype = new WacFormPrototype();  // extends WacFormPrototype
function WacGuardUserForm(){
    this.moduleName = "wacGuardUser";
    this.moduleId = "#" + this.moduleName;
    this.formId = this.moduleId + "Form";
    this.formDialogId = this.formId + "Dialog";
    this.listId = this.moduleId + "List";

    this.appControllerId = "wacAppSystemController";

    this.initDialog = function(){
        //    Wac.log("initWacGuardUserFormDialog.");
        $(this.formDialogId).dialog({
            bgiframe: true,
            modal: true,
            width: 880,
            height: 520,
            autoOpen: false,
            buttons: {},
            zIndex: 100
        });
    };

    this.initForm = function(){
        $(this.formId).validationEngine();

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
    };

    this.bindEvents = function(){
        $(this.formDialogId).bind('dialogopen', function(event, ui)
        {
            this.initFormData();
        //        Wac.log("calling " + moduleName + ":" + wacModelObj.wacGuardUser.name);//
        });

        $(this.formDialogId).bind('dialogclose', function(event, ui)
        {
            $.validationEngine.closePrompt(".formError", true);
        });

        $(this.moduleId + "_btnSubmit").bind('click', function (e)
        {
            this.submitMainForm();
        });

        $(this.moduleId + "_btnClose").bind('click', function (e)
        {
            $(this.formDialogId).dialog('close');
        });

        // fix dialog div didnt remove bug, remove it by this way
        $(this.appControllerId).bind('tabsremove', function(event, ui) {
            if(ui.panel.id == "t23002")
            {
                Wac.log(ui.panel.id + " 1:" + $("div[aria-labelledby='ui-dialog-title-"+ this.formDialogId +"']").length);
                $("div[aria-labelledby='ui-dialog-title-"+ this.formDialogId +"']").remove();
                $(this.formDialogId).remove();
                Wac.log(ui.panel.id + " 2:" + $("div[aria-labelledby='ui-dialog-title-"+ this.formDialogId +"']").length);
            }
        });
    };

    this.initFormData = function(){
        $(document).wacPage().showBlockUILoading(this.formDialogId);
        $(this.moduleId + '_sf_guard_user_group_list').empty();

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
            url: BASE_URL + this.moduleName + "/getFormData",
            global: true,
            type: "GET",
            data: params,
            dataType: "json",
            success: function(jsonData){
                this.initFormDataCallBack(jsonData);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                Wac.log("getFormData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
            }
        });
    };

    this.initFormDataCallBack = function(jsonData){
        if(jsonData.info.status == wacOperationStatus.Error)
        {
            alert(jsonData.info.message);
        }
        else
        {
            for(i=0;i<jsonData['items']['group'].length;i++)
            {
                $('<option value="' + jsonData['items']['group'][i].key +'">' + jsonData['items']['group'][i].value +'</option>').appendTo("#wacGuardUser_sf_guard_user_group_list");
            }

            for(i=0;i<jsonData['items']['user_group'].length;i++)
            {
                $(this.moduleId + "_sf_guard_user_group_list option[value='"+jsonData['items']['user_group'][i]+"']").attr("selected", true);
            }
        }

        this.setupDefaults(jsonData['items']['default']);

        $(document).wacPage().hideBlockUI(this.formDialogId);

    //   Wac.log($(document).wacTool().dumpObj(jsonData));
    };

    this.setupDefaults = function(defaultValueObj){
        if(wacGuardUserInputMode == wacFormInputMode.add)   // use default values
        {
            $(this.moduleId + "_id").attr("value", 0);
        }
        else  // use edit obj values
        {
            $(this.moduleId + "_id").attr("value", wacGuardUserObj.id);
            $(this.moduleId + "_username").attr("value", wacGuardUserObj.username);
            $(this.moduleId + "_password").attr("value", "000000");
            $(this.moduleId + "_password_confirm").attr("value", "000000");

            $(this.moduleId + "_is_active").attr("checked", (wacGuardUserObj.is_active=='true'));
        }
    };

    this.openMainForm = function(moduleFormName, moduleName, inputMode, rowid){
        wacGuardUserInputMode = inputMode;

        if(rowid === undefined){
            wacGuardUserObj = {};
        }
        else
        {
            wacGuardUserObj = $("#" + moduleName +"List").getRowData(rowid);
        }

        $('#'+moduleFormName).dialog('open');
    };

    this.validateMainForm = function(){
        var validateFlag = true;

        if (!$(this.formId).validationEngine({
            returnIsValid:true
        }))

        {
            validateFlag = false;
            return validateFlag;
        }

        if($(this.moduleId + "_password").val() != $(this.moduleId + "_password_confirm").val())
        {
            $(document).wacPage().showTips("请确认输入密码是否一致!");
            validateFlag = false;
        }

        if($(this.moduleId + "_sf_guard_user_group_list :selected").length == 0)
        {
            $(document).wacPage().showTips("请选择至少一个用户组!");
            validateFlag = false;
        }

        return validateFlag;
    };

    this.submitMainForm = function(){
        if(!validateWacGuardUserForm()){
            return;
        }

        $(document).wacPage().showBlockUILoading(this.formDialogId, "处理中...");

        var extraParams = "data_format=json";
        var submitUrl;

        if(wacGuardUserInputMode == wacFormInputMode.add){
            submitUrl = BASE_URL + this.moduleName + "/add";
        }
        else{
            submitUrl = BASE_URL + this.moduleName + "/edit";
        }


        $.ajax({
            url: submitUrl,
            //        url: BASE_URL + "test/ajaxTest" ,
            global: true,
            type: "GET",
            data: $(this.formId).serialize() + "&" + extraParams,
            dataType: "json",
            success: function(jsonData){
                this.submitMainFormCallBack(jsonData);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                Wac.log("getFormData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
            }
        });
    };

    this.submitMainFormCallBack = function(jsonData){
        if(jsonData.info.status == wacOperationStatus.Error)
        {
            $(document).wacPage().showTips(jsonData.info.message);
        }
        else
        {
            $(document).wacPage().showTips(jsonData.info.message);
            $(this.listId).trigger("reloadGrid");
        }

        $(document).wacPage().hideBlockUI(this.formDialogId);

    //   Wac.log($(document).wacTool().dumpObjObj(jsonData));
    };

}
   


//
//
//function bindWacGuardUserEvents()
//{
//    $("#wacGuardUserFormDialog").bind('dialogopen', function(event, ui)
//    {
//        initWacGuardUserFormData();
////        Wac.log("calling " + moduleName + ":" + wacModelObj.wacGuardUser.name);//
//    });
//
//    $("#wacGuardUserFormDialog").bind('dialogclose', function(event, ui)
//    {
//        $.validationEngine.closePrompt(".formError", true);
//    });
//
//    $("#wacGuardUser_btnSubmit").bind('click', function (e)
//    {
//        submitWacGuardUserForm();
//    });
//
//    $("#wacGuardUser_btnClose").bind('click', function (e)
//    {
//        $("#wacGuardUserFormDialog").dialog('close');
//    });
//
//    // fix dialog div didnt remove bug, remove it by this way
//    $('#wacAppSystemController').bind('tabsremove', function(event, ui) {
//        if(ui.panel.id == "t23002")
//        {
//            Wac.log(ui.panel.id + " 1:" + $("div[aria-labelledby='ui-dialog-title-wacGuardUserFormDialog']").length);
//            $("div[aria-labelledby='ui-dialog-title-wacGuardUserFormDialog']").remove();
//            $("#wacGuardUserFormDialog").remove();
//            Wac.log(ui.panel.id + " 2:" + $("div[aria-labelledby='ui-dialog-title-wacGuardUserFormDialog']").length);
//        }
//    });
//}
//
//
//function initWacGuardUserFormDialog()
//{
////    Wac.log("initWacGuardUserFormDialog.");
//    $("#wacGuardUserFormDialog").dialog({
//            bgiframe: true,
//            modal: true,
//            width: 880,
//            height: 520,
//            autoOpen: false,
//            buttons: {},
//            zIndex: 100
//        });
//}
//
//function initWacGuardUserForm()
//{
//    $("#wacGuardUserForm").validationEngine();
//
//    $('.wacFormContent .left, .wacFormContent input, .wacFormContent textarea, .wacFormContent select').focus(function(){
//        $(this).parents('.wacFormContent').addClass("wacFormOver");
//    }).blur(function(){
//        $(this).parents('.wacFormContent').removeClass("wacFormOver");
//    });
//
//    $('.wacFormContentA .left, .wacFormContentA input, .wacFormContentA textarea, .wacFormContentA select').focus(function(){
//        $(this).parents('.wacFormRow').addClass("wacFormOver");
//    }).blur(function(){
//        $(this).parents('.wacFormRow').removeClass("wacFormOver");
//    });
//
//
//}
//
//function initWacGuardUserFormData()
//{
//    $(document).wacPage().showBlockUILoading("#wacGuardUserFormDialog");
//    $('#wacGuardUser_sf_guard_user_group_list').empty();
//
//    if(wacGuardUserInputMode == wacFormInputMode.add)   // use default values
//    {
//        var params = {
//            "data_format" :'json'
//        };
//    }
//    else
//    {
//        var params = {
//            "data_format" :'json',
//            "id" : wacGuardUserObj.id
//        };
//    }
//
//
//    $.ajax({
//        url: BASE_URL + "wacGuardUser/getFormData",
//        global: true,
//        type: "GET",
//        data: params,
//        dataType: "json",
//        success: function(jsonData){
//            initWacGuardUserFormDataCallBack(jsonData);
//        },
//        error: function(XMLHttpRequest, textStatus, errorThrown){
//            Wac.log("getFormData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
//        }
//    });
//}
//
//function initWacGuardUserFormDataCallBack(jsonData)
//{
//   if(jsonData.info.status == wacOperationStatus.Error)
//   {
//       alert(jsonData.info.message);
//   }
//   else
//    {
//        for(i=0;i<jsonData['items']['group'].length;i++)
//        {
//            $('<option value="' + jsonData['items']['group'][i].key +'">' + jsonData['items']['group'][i].value +'</option>').appendTo("#wacGuardUser_sf_guard_user_group_list");
//        }
//
//        for(i=0;i<jsonData['items']['user_group'].length;i++)
//        {
//            $("#wacGuardUser_sf_guard_user_group_list option[value='"+jsonData['items']['user_group'][i]+"']").attr("selected", true);
//        }
//   }
//
//   setupWacGuardUserFormDefaultValues(jsonData['items']['default']);
//
//   $(document).wacPage().hideBlockUI("#wacGuardUserFormDialog");
//
////   Wac.log($(document).wacTool().dumpObj(jsonData));
//}
//
//function setupWacGuardUserFormDefaultValues(defaultValueObj)
//{
//    if(wacGuardUserInputMode == wacFormInputMode.add)   // use default values
//    {
//        $("#wacGuardUser_id").attr("value", 0);
//    }
//    else  // use edit obj values
//    {
//        $("#wacGuardUser_id").attr("value", wacGuardUserObj.id);
//        $("#wacGuardUser_username").attr("value", wacGuardUserObj.username);
//        $("#wacGuardUser_password").attr("value", "000000");
//        $("#wacGuardUser_password_confirm").attr("value", "000000");
//
//        $("#wacGuardUser_is_active").attr("checked", (wacGuardUserObj.is_active=='true'));
//    }
//
////    Wac.log($(document).wacTool().dumpObj(wacGuardUserObj));
////    Wac.log($(document).wacTool().dumpObj(defaultValueObj));
////    Wac.log("wacGuardUserInputMode: " + wacGuardUserInputMode);
//
//}
/***** init section, end *****/


/**************  interaction section, begin  ***************/

//function wacGuardUserOpenModuleForm(moduleFormName, moduleName, inputMode, rowid)
//{
//    wacGuardUserInputMode = inputMode;
//
//    if(rowid === undefined){
//        wacGuardUserObj = {};
//    }
//    else
//    {
//        wacGuardUserObj = $("#" + moduleName +"List").getRowData(rowid);
//    }
//
//    $('#'+moduleFormName).dialog('open');
//}
//
//function validateWacGuardUserForm()
//{
//    var validateFlag = true;
//
//    if (!$("#wacGuardUserForm").validationEngine({returnIsValid:true}))
//    {
//        validateFlag = false;
//        return validateFlag;
//    }
//
//    if($("#wacGuardUser_password").val() != $("#wacGuardUser_password_confirm").val())
//    {
//        $(document).wacPage().showTips("请确认输入密码是否一致!");
//        validateFlag = false;
//    }
//
//    if($("#wacGuardUser_sf_guard_user_group_list :selected").length == 0)
//    {
//        $(document).wacPage().showTips("请选择至少一个用户组!");
//        validateFlag = false;
//    }
//
//    return validateFlag;
//}
//
//function submitWacGuardUserForm()
//{
//    if(!validateWacGuardUserForm()){
//        return;
//    }
//
//    $(document).wacPage().showBlockUILoading("#wacGuardUserFormDialog", "处理中...");
//
//    var extraParams = "data_format=json";
//    var submitUrl;
//
//    if(wacGuardUserInputMode == wacFormInputMode.add){
//        submitUrl = BASE_URL + "wacGuardUser/add";
//    }
//    else{
//        submitUrl = BASE_URL + "wacGuardUser/edit";
//    }
//
//
//    $.ajax({
//        url: submitUrl,
////        url: BASE_URL + "test/ajaxTest" ,
//        global: true,
//        type: "GET",
//        data: $("#wacGuardUserForm").serialize() + "&" + extraParams,
//        dataType: "json",
//        success: function(jsonData){
//            submitWacGuardUserFormCallBack(jsonData);
//        },
//        error: function(XMLHttpRequest, textStatus, errorThrown){
//            Wac.log("getFormData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
//        }
//    });
//}
//
//function submitWacGuardUserFormCallBack(jsonData)
//{
//   if(jsonData.info.status == wacOperationStatus.Error)
//   {
//       $(document).wacPage().showTips(jsonData.info.message);
//   }
//   else
//   {
//       $(document).wacPage().showTips(jsonData.info.message);
//       $("#wacGuardUserList").trigger("reloadGrid");
//   }
//
//   $(document).wacPage().hideBlockUI("#wacGuardUserFormDialog");
//
////   Wac.log($(document).wacTool().dumpObjObj(jsonData));
//}

/**************  interaction section, end  ***************/