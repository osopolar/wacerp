/*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

/********   Notes:  *******
 *  Two tags need to be replaced with the module name, they are:
 *  wacGuardGroup
 *  WacGuardGroup
 *  wac_guard_group
 */



/***** variables declartion section, begin *****/
var wacGuardGroupInputMode = wacFormInputMode.add;
var wacGuardGroupObj = {};

/***** variables declartion section, end *****/

/***** init section, begin *****/
$(document).ready(
    function(){
        var wacGuardGroupForm = new WacGuardGroupForm();

        wacGuardGroupForm.initDialog();
        wacGuardGroupForm.initForm();
        wacGuardGroupForm.bindEvents();

        //        Wac.log($(document).hear("wacGuardGroupForm", "show-add-form", function ($self, data) {}));

        $(document).hear("wacGuardGroupForm", "wacGuardGroup_show_add_form_evt", function ($self, data) {  // listenerid, event name, callback
            Wac.log(data);
            wacGuardGroupForm.initFormData();
        //            Wac.log(jQuery._jq_shout.registry);
        });

        
    //        initWacGuardGroupFormDialog();
    //
    //        initWacGuardGroupForm();
    //
    //        bindWacGuardGroupEvents();
    }
    );


WacGuardGroupForm.prototype = new WacFormPrototype();  // extends WacFormPrototype
function WacGuardGroupForm(){
    var _self = this;
    this.moduleName = "wacGuardGroup";
    this.moduleId = "#" + this.moduleName;
    this.formId = this.moduleId + "Form";
    this.formDialogId = this.formId + "Dialog";
    this.listId = this.moduleId + "List";

    this.appControllerId = "#wacAppSystemController";

    this.initDialog = function(){
        //    Wac.log("initWacGuardGroupFormDialog.");
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
        // unbind all events related to the dialog form
        $(this.formDialogId).unbind();
        
        $(this.formDialogId).bind('dialogopen', function(event, ui)
        {
            this.initFormData();
        //        Wac.log("calling " + moduleName + ":" + wacModelObj.wacGuardGroup.name);//
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
        $(this.appControllerId).unbind('tabsremove');
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

        if(wacGuardGroupInputMode == wacFormInputMode.add)   // use default values
        {
            var params = {
                "dataFormat" :'json'
            };
        }
        else
        {
            var params = {
                "dataFormat" :'json',
                "id" : wacGuardGroupObj.id
            };
        }


        $.ajax({
            url: BASE_URL + this.moduleName + "/getFormData",
            global: true,
            type: "GET",
            data: params,
            dataType: "json",
            success: function(jsonData){
                _self.initFormDataCallBack(jsonData);
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
            for(i=0;i<jsonData['items']['permission'].length;i++)
            {
                $('<option value="' + jsonData['items']['permission'][i].key +'">' + jsonData['items']['permission'][i].value +'</option>').appendTo("#wacGuardGroup_sf_guard_group_permissions_list");
            }

            for(i=0;i<jsonData['items']['group_permission'].length;i++)
            {
                $("#wacGuardGroup_sf_guard_group_permissions_list option[value='"+jsonData['items']['group_permission'][i]+"']").attr("selected", true);
            }
        }

        this.setupDefaults(jsonData['items']['default']);

        $(document).wacPage().hideBlockUI(this.formDialogId);

    //   Wac.log($(document).wacTool().dumpObj(jsonData));
    };

    this.setupDefaults = function(defaultValueObj){
        if(wacGuardGroupInputMode == wacFormInputMode.add)   // use default values
        {
            $(this.moduleId + "_id").attr("value", 0);
        }
        else  // use edit obj values
        {
            $(this.moduleId + "_id").attr("value", wacGuardGroupObj.id);
            $(this.moduleId + "_username").attr("value", wacGuardGroupObj.username);
            $(this.moduleId + "_password").attr("value", "000000");
            $(this.moduleId + "_password_confirm").attr("value", "000000");

            $(this.moduleId + "_is_active").attr("checked", (wacGuardGroupObj.is_active=='true'));
        }
    };

    this.openMainForm = function(moduleFormName, moduleName, inputMode, rowid){
        wacGuardGroupInputMode = inputMode;

        if(rowid === undefined){
            wacGuardGroupObj = {};
        }
        else
        {
            wacGuardGroupObj = $("#" + moduleName +"List").getRowData(rowid);
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
        if(!validateWacGuardGroupForm()){
            return;
        }

        $(document).wacPage().showBlockUILoading(this.formDialogId, "处理中...");

        var extraParams = "dataFormat=json";
        var submitUrl;

        if(wacGuardGroupInputMode == wacFormInputMode.add){
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
   


/**************  interaction section, end  ***************/