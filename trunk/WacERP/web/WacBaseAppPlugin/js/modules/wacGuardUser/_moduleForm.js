/*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

/********   Notes:  *******
 *  Two tags need to be replaced with the module name, they are:
 *  wacGuardUser
 *  WacGuardUser
 */

/***** init section, begin *****/
$(document).ready(
  function(){
        var wacGuardUserForm = new WacGuardUserForm();
});


function WacGuardUserForm(){
    var _self           = this;
    this.prototype      = new WacFormPrototype();  // extends WacFormPrototype

    this.appControllerId = "#wacAppSystemController";  // be used to listen tab-remove event of the controller
    this.attacheName    = "";  // sometimes, there are several different lists, use this field to distinglish the corresponding forms
    this.moduleName     = "wacGuardUser" + this.attacheName;
    this.moduleId       = "#" + this.moduleName;
    this.uiPanelId      = WacEntity.module.getUiPanelId(this.moduleName);  // to fix the bug that cannot remove dialog in tab panel when close tab, so need to point out the panel ui id here

    // layout order, div > dialog > form
    this.formName       = this.moduleName + "Form";
    this.formId         = this.moduleId + "Form";
    this.formDialogName = this.formName + "Dialog";
    this.formDialogId   = this.formId + "Dialog";
    this.listId         = this.moduleId + "List";
    this.modelEntity    = {};  // map to current data model entity
    this.inputMode      = WacEntity.formInputMode.add;

    this.init = function(){
        _self.prototype.init(_self);
    };

    this.initDialog = function(){
        _self.prototype.initDialog(_self);
    };

    this.initForm = function(){
        _self.prototype.initForm(_self);
    };

    this.bindEvents = function(){
        _self.prototype.bindEvents(_self);
    };

    this.initFormData = function(){
        _self.prototype.initFormData(_self);
    };

    this.initFormDataCallBack = function(jsonData){
        if(jsonData.info.status == WacEntity.operationStatus.Error)
        {
            Wac.log(jsonData.info.message);
        }
        else
        {
            $(_self.moduleId + '_sf_guard_user_group_list').empty();
            
            for(i=0;i<jsonData['items']['group'].length;i++)
            {
                $('<option value="' + jsonData['items']['group'][i].key +'">' + jsonData['items']['group'][i].value +'</option>').appendTo(_self.moduleId + "_sf_guard_user_group_list");
            }

            for(i=0;i<jsonData['items']['user_group'].length;i++)
            {
                $(_self.moduleId + "_sf_guard_user_group_list option[value='"+jsonData['items']['user_group'][i]+"']").attr("selected", true);
            }
        }

        _self.prototype.initFormDataCallBack(_self, jsonData);
        
    //   Wac.log($(document).wacTool().dumpObj(jsonData));
    };

    this.setupDefaults = function(defaultValueObj){
        if(_self.inputMode == WacEntity.formInputMode.add)   // use default values
        {
            $(_self.moduleId + "_id").attr("value", 0);
        }
        else  // use edit obj values
        {
            $(_self.moduleId + "_id").attr("value", _self.modelEntity.id);
            $(_self.moduleId + "_username").attr("value", _self.modelEntity.username);
            $(_self.moduleId + "_password").attr("value", "000000");
            $(_self.moduleId + "_password_confirm").attr("value", "000000");
            $(_self.moduleId + "_is_active").attr("checked", (_self.modelEntity.is_active=='true'));
//            Wac.log(_self.modelEntity);
        }

         _self.prototype.setupDefaults(_self, defaultValueObj);
    };

    this.openMainForm = function(inputMode, id){
        _self.prototype.openMainForm(_self, inputMode, id);
    };

    this.validateMainForm = function(){
        var validateFlag = _self.prototype.validateMainForm(_self);

        if (!validateFlag)
        {
            return validateFlag;
        }

        if(validateFlag && ($(_self.moduleId + "_password").val() != $(_self.moduleId + "_password_confirm").val()))
        {
            $(document).wacPage().showTips($.i18n.prop('Password is not the same, please try again!'));
            validateFlag = false;
        }

        if(validateFlag && ($(_self.moduleId + "_sf_guard_user_group_list :selected").length == 0))
        {
            $(document).wacPage().showTips($.i18n.prop('Please select one item at least!'));
            validateFlag = false;
        }

        return validateFlag;
    };

    this.submitMainForm = function(){
        _self.prototype.submitMainForm(_self);        
    };

    this.submitMainFormCallBack = function(jsonData){
        _self.prototype.submitMainFormCallBack(_self, jsonData);
    //   Wac.log($(document).wacTool().dumpObjObj(jsonData));
    };

    
    this.init();  // init method
//    this.init(_self);  // init method

}
   


/**************  interaction section, end  ***************/