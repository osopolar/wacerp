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


function WacGuardGroupForm(){
    var _self           = this;
    this.prototype      = new WacFormPrototype();  // extends WacFormPrototype

    this.appControllerId = "#wacAppSystemController";  // be used to listen tab-remove event of the controller
    this.attacheName    = "";  // sometimes, there are several different lists, use this field to distinglish the corresponding forms
    this.moduleName     = "wacGuardGroup" + this.attacheName;
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
            $(_self.moduleId + '_sf_guard_group_permissions_list').empty();
            
            for(i=0;i<jsonData['items']['permission'].length;i++)
            {
                $('<option value="' + jsonData['items']['permission'][i].key +'">' + jsonData['items']['permission'][i].value +'</option>').appendTo(_self.moduleId + "_sf_guard_group_permissions_list");
            }

            for(i=0;i<jsonData['items']['group_permission'].length;i++)
            {
                $(_self.moduleId + "_sf_guard_group_permissions_list option[value='"+jsonData['items']['group_permission'][i]+"']").attr("selected", true);
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
            $(_self.moduleId + "_name").attr("value", _self.modelEntity.name);
            $(_self.moduleId + "_description").attr("value", _self.modelEntity.description);
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

        if($(_self.moduleId + "_sf_guard_group_permissions_list :selected").length == 0)
        {
            $(document).wacPage().showTips($.i18n.prop('Please select one permission at least!'));
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