/*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

/********   Notes:  *******
 *  Two tags need to be replaced with the module name, they are:
 *  wacGuardGroup
 *  WacGuardGroup
 */

/***** init section, begin *****/
$(document).ready(
    function(){
        var wacGuardGroupForm = new WacGuardGroupForm();
    }
    );


WacGuardGroupForm.prototype = new WacFormPrototype();  // extends WacFormPrototype
function WacGuardGroupForm(){
    var _self           = this;
    this.uiPanelId      = "t23003";  // to fix the bug that cannot remove dialog in tab panel when close tab, so need to point out the panel ui id here
    this.moduleName     = "wacGuardGroup";
    this.moduleId       = "#" + this.moduleName;
    this.formName       = this.moduleName + "Form";
    this.formId         = this.moduleId + "Form";
    this.formDialogName = this.formName + "Dialog";
    this.formDialogId   = this.formId + "Dialog";
    this.listId         = this.moduleId + "List";
    this.modelEntity    = {};
    this.inputMode      = wacFormInputMode.add;

    this.appControllerId = "#wacAppSystemController";

    this.init = function(){
        _self.initDialog();
        _self.initForm();
        _self.bindEvents();
    };

    this.initDialog = function(){
        //        Wac.log("initWacGuardGroupFormDialog." + this.formDialogId);
        $(_self.formDialogId).dialog({
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
        $(_self.formId).validationEngine();

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
        $(document).hear(_self.formId, _self.moduleName+"_show_add_form_evt", function ($self, data) {  // listenerid, event name, callback
            _self.openMainForm(wacFormInputMode.add);
//            Wac.log(data);
//            Wac.log(jQuery._jq_shout.registry);
        });

        $(document).hear(_self.formId, _self.moduleName+"_show_edit_form_evt", function ($self, data) {  // listenerid, event name, callback
            _self.openMainForm(wacFormInputMode.edit, data.id);
//            Wac.log(data);
//            Wac.log(jQuery._jq_shout.registry);
        });

        // unbind all events related to the dialog form
        $(_self.formDialogId).unbind();
        
        $(_self.formDialogId).bind('dialogopen', function(event, ui)
        {
            _self.initFormData();
        //        Wac.log("calling " + moduleName + ":" + wacModelObj.wacGuardGroup.name);//
        });

        $(_self.formDialogId).bind('dialogclose', function(event, ui)
        {
            $.validationEngine.closePrompt(".formError", true);
        });

        $(_self.moduleId + "_btnSubmit").bind('click', function (e)
        {
            _self.submitMainForm();
        });

        $(_self.moduleId + "_btnClose").bind('click', function (e)
        {
            $(_self.formDialogId).dialog('close');
        });

        // fix dialog div didnt remove bug, remove it by this way
        $(_self.appControllerId).unbind('tabsremove');
        $(_self.appControllerId).bind('tabsremove', function(event, ui) {
//            Wac.log("ui.panel.id:" + ui.panel.id);
            if(ui.panel.id == _self.uiPanelId)
            {
//                Wac.log("div[aria-labelledby='ui-dialog-title-"+ _self.formDialogName +"']");
//                Wac.log(ui.panel.id + " 1:" + $("div[aria-labelledby='ui-dialog-title-"+ _self.formDialogName +"']").length);
                $("div[aria-labelledby='ui-dialog-title-"+ _self.formDialogName +"']").remove();  // remove dialog div
                $("div[class='"+ _self.moduleName +"_nameformError']").remove();  //remove error msg div
            }
        });
    };

    this.initFormData = function(){
        $(document).wacPage().showBlockUILoading(_self.formDialogId);
        $(_self.moduleId + '_sf_guard_user_group_list').empty();

        var params ={};
        if(_self.inputMode == wacFormInputMode.add)   // use default values
        {
            params = {
                "dataFormat" :'json'
            };
        }
        else
        {
            params = {
                "dataFormat" :'json',
                "id" : _self.modelEntity.id
            };
        }


        $.ajax({
            url: BASE_URL + _self.moduleName + "/getFormData",
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
                $('<option value="' + jsonData['items']['permission'][i].key +'">' + jsonData['items']['permission'][i].value +'</option>').appendTo(_self.moduleId + "_sf_guard_group_permissions_list");
            }

            for(i=0;i<jsonData['items']['group_permission'].length;i++)
            {
                $(_self.moduleId + "_sf_guard_group_permissions_list option[value='"+jsonData['items']['group_permission'][i]+"']").attr("selected", true);
            }
        }

        _self.setupDefaults(jsonData['items']['default']);

        $(document).wacPage().hideBlockUI(_self.formDialogId);

    //   Wac.log($(document).wacTool().dumpObj(jsonData));
    };

    this.setupDefaults = function(defaultValueObj){
        if(_self.inputMode == wacFormInputMode.add)   // use default values
        {
            $(_self.moduleId + "_id").attr("value", 0);
        }
        else  // use edit obj values
        {
            $(_self.moduleId + "_id").attr("value", _self.modelEntity.id);
            $(_self.moduleId + "_name").attr("value", _self.modelEntity.name);
            $(_self.moduleId + "_description").attr("value", _self.modelEntity.description);
        }
    };

    this.openMainForm = function(inputMode, id){
        _self.inputMode = inputMode;

        if(id === undefined){
            _self.modelEntity = {};
        }
        else
        {
            _self.modelEntity = $(_self.moduleId +"List").getRowData(id);
        }

        $(_self.formDialogId).dialog('open');
    };

    this.validateMainForm = function(){
        var validateFlag = true;

        if (!$(_self.formId).validationEngine({returnIsValid:true}))
        {
            validateFlag = false;
            return validateFlag;
        }

        if($(_self.moduleId + "_sf_guard_group_permissions_list :selected").length == 0)
        {
            $(document).wacPage().showTips("请选择至少一个权限!");
            validateFlag = false;
        }

        return validateFlag;
    };

    this.submitMainForm = function(){
        if(!_self.validateMainForm()){
            return;
        }

        $(document).wacPage().showBlockUILoading(_self.formDialogId, "处理中...");

        var extraParams = "dataFormat=json";
        var submitUrl;

        if(_self.inputMode == wacFormInputMode.add){
            submitUrl = BASE_URL + _self.moduleName + "/add";
        }
        else{
            submitUrl = BASE_URL + _self.moduleName + "/edit";
        }


        $.ajax({
            url: submitUrl,
            //        url: BASE_URL + "test/ajaxTest" ,
            global: true,
            type: "GET",
            data: $(_self.formId).serialize() + "&" + extraParams,
            dataType: "json",
            success: function(jsonData){
                _self.submitMainFormCallBack(jsonData);
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
            $(_self.listId).trigger("reloadGrid");
        }

        $(document).wacPage().hideBlockUI(_self.formDialogId);

    //   Wac.log($(document).wacTool().dumpObjObj(jsonData));
    };

    
    this.init();  // init method

}
   


/**************  interaction section, end  ***************/