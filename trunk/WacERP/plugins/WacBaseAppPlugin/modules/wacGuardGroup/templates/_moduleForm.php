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
<div id="<?php echo $componentGlobalName; ?>" title="<?php echo WacModule::getInstance()->getCaption($moduleName); ?>" class="ui-widget" style="display: none" >
    <form name="<?php echo $componentFormName; ?>" id="<?php echo $componentFormName; ?>" method="post" action="" class="wacFormA">
        <div class="wacFormFirstCol">
            <div class="wacFormContentA">
                <div class="wacFormRow">
                    <div class="wacFormItemLeft "><?php echo __("Coding"); ?></div>
                    <div class="wacFormItemRight">
                        <input name="name" id="name_<?php echo $componentGlobalName; ?>" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                    </div>
                    <div class="wacFormClear"></div>
                </div>
                <div class="wacFormRow">
                    <div class="wacFormItemLeft"><?php echo __("Name"); ?></div>
                    <div class="wacFormItemRight">
                        <textarea name="description" id="description_<?php echo $componentGlobalName; ?>" class="validate[required] ui-widget-content ui-corner-all" cols="35" rows="4"></textarea>
                    </div>
                    <div class="wacFormClear"></div>
                </div>
            </div>


        </div>
        <div class="wacFormSecondCol">
            <h3>&nbsp;</h3>
            <div class="wacFormContentA">
                <div class="wacFormRow">
                    <div class="wacFormItemLeft">
                        <label for="<?php echo $componentGlobalName; ?>_sf_guard_group_permissions_list">
                            <?php echo __("Permission List"); ?>
                        </label>
                        <br/>(<?php echo __("Press Ctrl to mutiple select items"); ?>)
                    </div>
                    <div class="wacFormItemRight">
                        <select name="permission_list[]" multiple="multiple" id="sf_guard_group_permissions_list_<?php echo $componentGlobalName; ?>" style="width: 195px; height: 300px" class="ui-widget-content ui-corner-all">
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
            <input name="btnSave" id="btnSave_<?php echo $componentGlobalName; ?>" type="button" value="<?php echo __("Save"); ?>"/>
            &nbsp;&nbsp;
            <input name="btnClose" id="btnClose_<?php echo $componentGlobalName; ?>" type="button" value="<?php echo __("Close"); ?>"/>
        </div>

        <input type="hidden" name="id" id="id_<?php echo $componentGlobalName; ?>" value="0">
    </form>
</div>

<script type="text/javascript">
    //<![CDATA[
    /***** init section, begin *****/
    $("<?php echo $componentGlobalId; ?>").ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });


    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;
        this.prototype      = new WacFormPrototype();  // extends WacFormPrototype
        this.prototype.constructor = this;

        this.appControllerId = "#wacAppSystemController";  // be used to listen tab-remove event of the controller
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
                $('#sf_guard_group_permissions_list_' + _self.componentGlobalName).empty();

                for(i=0;i<jsonData['items']['permission'].length;i++)
                {
                    $('<option value="' + jsonData['items']['permission'][i].key +'">' + jsonData['items']['permission'][i].value +'</option>').appendTo('#sf_guard_group_permissions_list_' + _self.componentGlobalName);
                }

                for(i=0;i<jsonData['items']['group_permission'].length;i++)
                {
                    $("#sf_guard_group_permissions_list_" + _self.componentGlobalName + " option[value='"+jsonData['items']['group_permission'][i]+"']").attr("selected", true);
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
                $("#name_" + _self.componentGlobalName).attr("value", _self.modelEntity.name);
                $("#description_" + _self.componentGlobalName).attr("value", _self.modelEntity.description);
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

            if(validateFlag && $("#sf_guard_group_permissions_list_" + _self.componentGlobalName + " :selected").length == 0)
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

    }
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>