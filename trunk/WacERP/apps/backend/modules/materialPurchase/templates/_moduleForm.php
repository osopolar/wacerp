<?php
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName  = WacModuleHelper::getFormDialogId($moduleName, $invokeParams['attachInfo']);
$componentGlobalId    = "#".$componentGlobalName;
$componentFormName    = WacModuleHelper::getFormId($componentGlobalName, $invokeParams['attachInfo']);
$componentFormId      = "#".$componentFormName;
$componentListingTableId = "#".WacModuleHelper::getListingTableId($moduleName, $invokeParams['attachInfo']);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>
<div id="<?php echo $componentGlobalName;?>" title="<?php echo WacModule::getInstance()->getCaption($moduleName);?>" class="ui-widget" style="display: none" >
<form name="<?php echo $componentFormName;?>" id="<?php echo $componentFormName;?>" method="post" action="" class="wacFormA">
    <div class="wacFormFirstCol">
        <div class="wacFormContentA">
            <div class="wacFormRow">
                <div class="wacFormItemLeft "><?php echo __("User Name");?></div>
                <div class="wacFormItemRight">
                    <input name="username" id="username_<?php echo $componentGlobalName; ?>" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft"><?php echo __("Password");?></div>
                <div class="wacFormItemRight">
                    <input name="password" id="password_<?php echo $componentGlobalName; ?>" maxlength="20" type="password" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft"><?php echo __("Password").__("Confirm");?></div>
                <div class="wacFormItemRight">
                    <input name="password_confirm" id="password_confirm_<?php echo $componentGlobalName; ?>" maxlength="20" type="password" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft">
                    <label for="is_active_<?php echo $componentGlobalName; ?>"><?php echo __("Status Active");?></label>
                </div>
                <div class="wacFormItemRight">
                    <input name="is_active" id="is_active_<?php echo $componentGlobalName; ?>" checked="true" value="1" type="checkbox" class="ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
        </div>
        
        
    </div>
    <div class="wacFormSecondCol">
        <div class="wacFormContentA">
            <div class="wacFormRow">
                <div class="wacFormItemLeft">
                    <label for="sf_guard_user_group_list_<?php echo $componentGlobalName ?>">
                        <?php echo __("User Group");?>
                    </label>
                    <br/>(<?php echo __("Press Ctrl to mutiple select items");?>)
                </div>
                <div class="wacFormItemRight">
                   <select name="user_group_list[]" multiple="multiple" id="sf_guard_user_group_list_<?php echo $componentGlobalName ?>" style="width: 195px; height: 300px" class="ui-widget-content ui-corner-all">
                   </select>
                </div>
                <div class="wacFormClear"></div>
            </div>

        </div>
        
    </div>
    <div class="wacFormClear"></div>
    <div class="wacFormBottom" align="center">

        <hr class="wacFormRuler" style="width:700px; float:inherit;" />

   <div class="wacFormClear"></div>
   <br/>
   <input name="btnSave" id="btnSave_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Save");?>"/>
      &nbsp;&nbsp;
      <input name="btnClose" id="btnClose_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Close");?>"/>
    </div>

    <input type="hidden" name="id" id="id_<?php echo $componentGlobalName ?>" value="0">
</form>
</div>

<script type="text/javascript">
    //<![CDATA[
    /*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

    /***** init section, begin *****/
    $("<?php echo $componentGlobalId; ?>").ready(function(){
//        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });


    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;
        this.prototype      = new WacFormPrototype();  // extends WacFormPrototype
        this.prototype.constructor = this;

        this.appControllerId   = "#wacAppSystemController";  // be used to listen tab-remove event of the controller
        this.moduleName        = <?php echo "'{$moduleName}'" ?>;
        this.moduleGlobalName  = <?php echo "'{$moduleGlobalName}'" ?>;
        this.componentGlobalName = "<?php echo $componentGlobalName; ?>";
        this.componentGlobalId = "<?php echo $componentGlobalId; ?>";
        this.uiPanelId         = WacEntity.module.getUiPanelId(this.moduleName);  // to fix the bug that cannot remove dialog in tab panel when close tab, so need to point out the panel ui id here

        // layout order, div > dialog > form
        this.formDialogName = "<?php echo $componentGlobalName; ?>";
        this.formDialogId   = "<?php echo $componentGlobalId; ?>";
        this.formName       = "<?php echo $componentFormName; ?>";
        this.formId         = "<?php echo $componentFormId; ?>";
        this.listId         = "<?php echo $componentListingTableId; ?>";
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
                $('#sf_guard_user_group_list_' + _self.componentGlobalName).empty();

                for(i=0;i<jsonData['items']['group'].length;i++)
                {
                    $('<option value="' + jsonData['items']['group'][i].key +'">' + jsonData['items']['group'][i].value +'</option>').appendTo('#sf_guard_user_group_list_' + _self.componentGlobalName);
                }

                for(i=0;i<jsonData['items']['user_group'].length;i++)
                {
                    $('#sf_guard_user_group_list_' + _self.componentGlobalName + " option[value='"+jsonData['items']['user_group'][i]+"']").attr("selected", true);
                }
            }

            _self.prototype.initFormDataCallBack(_self, jsonData);

            //   Wac.log($(document).wacTool().dumpObj(jsonData));
        };

        this.setupDefaults = function(defaultValueObj){
            if(_self.inputMode == WacEntity.formInputMode.add)   // use default values
            {
                $("#id_" + _self.componentGlobalName).attr("value", 0);
            }
            else  // use edit obj values
            {
                $("#id_" + _self.componentGlobalName).attr("value", _self.modelEntity.id);
                $("#username_" + _self.componentGlobalName).attr("value", _self.modelEntity.username);
                $("#password_" + _self.componentGlobalName).attr("value", "000000");
                $("#password_confirm_" + _self.componentGlobalName).attr("value", "000000");
                $("#is_active_" + _self.componentGlobalName).attr("checked", (_self.modelEntity.is_active=='true'));
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

            if(validateFlag && ($("#password_" + _self.componentGlobalName).val() != $("#password_confirm_" + _self.componentGlobalName).val()))
            {
                $(document).wacPage().showTips($.i18n.prop('Password is not the same, please try again!'));
                validateFlag = false;
            }

            if(validateFlag && ($("#sf_guard_user_group_list_" + _self.componentGlobalName + " :selected").length == 0))
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
        
    }

     /**************  interaction section, end  ***************/
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>