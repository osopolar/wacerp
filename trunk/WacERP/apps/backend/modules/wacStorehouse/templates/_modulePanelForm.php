<?php
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName  = WacModuleHelper::getFormPanelId($moduleName, $invokeParams['attachInfo']);
$componentGlobalId    = "#".$componentGlobalName;
$componentFormName    = WacModuleHelper::getFormId($componentGlobalName, $invokeParams['attachInfo']);
$componentFormId      = "#".$componentFormName;
$componentListingTableId = "#".WacModuleHelper::getListingTableId($moduleName, $invokeParams['attachInfo']);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>
<div id="<?php echo $componentGlobalName; ?>" title="<?php echo WacModule::getInstance()->getCaption($moduleName); ?>" class="ui-widget centralPanel" >
    <h3><?php echo __("Module Name"); ?></h3>
    <div>
        <form name="<?php echo $componentFormName; ?>" id="<?php echo $componentFormName; ?>" method="post" action="" class="wacFormA">
            <div class="wacFormFirstCol">
                <div class="wacFormContentA">
                    <div class="wacPanelFormRow">
                        <div class="wacFormItemLeftSmall "><?php echo __("Name"); ?></div>
                        <div class="wacFormItemRightSmall">
                            <input name="name" id="name_<?php echo $componentGlobalName; ?>" type="text" class="validate[required] wacFormText DataTD ui-widget-content ui-corner-all" />
                        </div>
                        <div class="wacFormClear"></div>
                    </div>
                    <div class="wacPanelFormRow">
                        <div class="wacFormItemLeftSmall"><?php echo __("Code"); ?></div>
                        <div class="wacFormItemRightSmall">
                            <input name="code" id="code_<?php echo $componentGlobalName; ?>" maxlength="20" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                        </div>
                        <div class="wacFormClear"></div>
                    </div>
                    <div class="wacPanelFormRow">
                        <div class="wacFormItemLeftSmall">
                            <label for="is_avail_<?php echo $componentGlobalName; ?>"><?php echo __("Is avail"); ?></label>
                        </div>
                        <div class="wacFormItemRightSmall">
                            <input name="is_avail" id="is_avail_<?php echo $componentGlobalName; ?>" checked="true" value="1" type="checkbox" class="ui-widget-content ui-corner-all" />
                        </div>
                        <div class="wacFormClear"></div>
                    </div>
                </div>


            </div>
            <div class="wacFormSecondCol">
                <div class="wacFormContentA">
                    <div class="wacPanelFormRow">
                        <div class="wacFormClear"></div>
                    </div>
                </div>
            </div>
            <div class="wacFormClear"></div>
            <div class="wacFormBottom">
                <hr class="wacFormRuler" style="width:100%; float:inherit;" />
                <div class="wacFormClear"></div>
                <?php echo __("Switch").__("Input Mode") ?>:
                <span id="groupInputMode_<?php echo $componentGlobalName ?>">
                    <input type="radio" id="input_mode_add_<?php echo $componentGlobalName ?>" name="input_mode_<?php echo $componentGlobalName ?>" value="<?php echo WacOperationType::$add;?>" /><label for="input_mode_add_<?php echo $componentGlobalName ?>"><?php echo __("Mode Create") ?></label>
                    <input type="radio" id="input_mode_edit_<?php echo $componentGlobalName ?>" name="input_mode_<?php echo $componentGlobalName ?>" value="<?php echo WacOperationType::$edit;?>" /><label for="input_mode_edit_<?php echo $componentGlobalName ?>"><?php echo __("Mode Edit") ?></label>
                </span>
                <span id="groupFunc_<?php echo $componentGlobalName ?>" style="float:right">
                    <input name="btnSave" id="btnSave_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Save"); ?>"/>
                    <input name="btnDel" id="btnDel_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Delete"); ?>"/>
                    <input name="btnPrint" id="btnPrint_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Print"); ?>"/>
                </span>
            </div>

            <input type="hidden" name="id" id="id_<?php echo $componentGlobalName ?>" value="0">
        </form>
    </div>
</div>

<script type="text/javascript">
    //<![CDATA[
    /*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

    /***** init section, begin *****/
    $("<?php echo $componentGlobalId; ?>").ready(function(){
//        Wac.log("<?php echo $componentGlobalId; ?> ready");
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });


    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;
        this.prototype      = new WacPanelFormPrototype();  // extends WacFormPrototype
        this.prototype.constructor = this;

        this.moduleName        = <?php echo "'{$moduleName}'" ?>;
        this.moduleGlobalName  = <?php echo "'{$moduleGlobalName}'" ?>;
        this.componentGlobalName = "<?php echo $componentGlobalName; ?>";
        this.componentGlobalId = "<?php echo $componentGlobalId; ?>";

        this.formName       = "<?php echo $componentFormName; ?>";
        this.formId         = "<?php echo $componentFormId; ?>";

        this.modelEntity    = {};  // map to current data model entity
        this.inputMode      = WacEntity.formInputMode.add;

        this.init = function(){
            _self.prototype.init(_self);
        };

        this.bindEvents = function(){
            _self.prototype.bindEvents(_self);
        };

        this.initLayout = function(){
            _self.prototype.initLayout(_self);
        };

        this.initData = function(){
            _self.prototype.initData(_self);
        };

        this.initDataCallback = function(jsonData){
            _self.prototype.initDataCallback(_self, jsonData);
        };

        this.switchInputMode = function(mode){
            _self.prototype.switchInputMode(_self, mode);
        };

        this.emptyForm = function(){
            _self.prototype.emptyForm(_self);
        };

        this.setupDefaults = function(defaultValueObj){
            _self.prototype.setupDefaults(_self, defaultValueObj);
        };

        this.validateMainForm = function(){
            var validateFlag = _self.prototype.validateMainForm(_self);
            return validateFlag;
        };

        this.saveForm = function(){
            _self.prototype.saveForm(_self);
        };

        this.saveFormCallback = function(jsonData){
            _self.prototype.saveFormCallback(_self, jsonData);
            //   Wac.log($(document).wacTool().dumpObjObj(jsonData));
        };

        this.init();  // init method
        
    }

     /**************  interaction section, end  ***************/
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>