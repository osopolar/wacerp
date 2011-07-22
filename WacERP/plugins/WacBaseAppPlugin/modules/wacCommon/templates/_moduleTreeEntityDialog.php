<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName              = $contextInfo['moduleName'];
$moduleGlobalName        = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName     = WacModuleHelper::getFormDialogId($moduleName, $invokeParams['attachInfo']);
$componentGlobalId       = "#".$componentGlobalName;
$componentCaption        = WacModule::getInstance()->getCaption($moduleName);
$componentFormName       = WacModuleHelper::getFormId($componentGlobalName, $invokeParams['attachInfo']);
$componentFormId         = "#".$componentFormName;
$cfgDialogDisplay        = (isset($invokeParams['config']['isHidden']) && $invokeParams['config']['isHidden']) ? "display: none;" : "display: inline;";
//print_r($contextInfo);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>
<div id="<?php echo $componentGlobalName; ?>" style="<?php echo $cfgDialogDisplay; ?>" title="<?php echo __($invokeParams['config']["title"]); ?>" class="ui-widget" >
    <form name="<?php echo $componentFormName; ?>" id="<?php echo $componentFormName; ?>" method="post" action="" class="wacFormA">
        <div class="wacFormFirstCol">
            <div class="wacFormContentA">
                <div class="wacFormRow">
                    <div class="wacFormItemLeft "><?php echo __("Name"); ?></div>
                    <div class="wacFormItemRight">
                        <input name="name" id="name_<?php echo $componentGlobalName; ?>" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                    </div>
                    <div class="wacFormClear"></div>
                </div>
                <div class="wacFormRow">
                    <div class="wacFormItemLeft"><?php echo __("Code"); ?></div>
                    <div class="wacFormItemRight">
                        <input name="code" id="code_<?php echo $componentGlobalName; ?>" maxlength="20" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                    </div>
                    <div class="wacFormClear"></div>
                </div>
            </div>
        </div>

        <div class="wacFormClear"></div>
        <div class="wacFormBottom" align="center">
            <hr class="wacFormRuler" style="width:100%; float:inherit;" />

            <div class="wacFormClear"></div>
            <br/>
            <input name="btnSave" id="btnSave_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Save"); ?>"/>
            &nbsp;&nbsp;
            <input name="btnClose" id="btnClose_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Cancel"); ?>"/>
        </div>

        <input type="hidden" name="id" id="id_<?php echo $componentGlobalName ?>" value="0"/>
    </form>
</div>

<script type="text/javascript">
    //<![CDATA[
    /*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 7/22/2011 4:10:45 PM  *****/

    /***** init section, begin *****/
    $("<?php echo $componentGlobalId; ?>").ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });

    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;
        this.prototype      = new WacStdFormPrototype();  // extends WacFormPrototype
        this.prototype.constructor = this;

        this.appControllerId   = "wacAppController";  // be used to listen tab-remove event of the controller
        this.moduleName        = <?php echo "'{$moduleName}'" ?>;
        this.moduleGlobalName  = <?php echo "'{$moduleGlobalName}'" ?>;
        this.componentGlobalName = "<?php echo $componentGlobalName; ?>";
        this.componentGlobalId = "<?php echo $componentGlobalId; ?>";
        this.uiPanelId         = WacEntity.module.getUiPanelId(this.moduleName);  // to fix the bug that cannot remove dialog in tab panel when close tab, so need to point out the panel ui id here

        this.formName       = "<?php echo $componentFormName; ?>";
        this.formId         = "<?php echo $componentFormId; ?>";

        this.modelEntity    = {};  // map to current data model entity
        this.inputMode      = WacEntity.formInputMode.add;
        this.ajaxInitData   = true;    // determine the data is inited by ajax 
        this.ajaxModelEntity = true;    // determine the model entity is got by ajax when edit

        this.dialogProperties = {width: 460,height: 250}

        this.init = function(){
            _self.prototype.init(_self);
        };

        this.initLayout = function(){
            _self.prototype.initLayout(_self);
        };

        this.bindEvents = function(){
            _self.prototype.bindEvents(_self);
        };

        this.initData = function(){
            _self.prototype.initData(_self);
        };

        this.initDataCallback = function(jsonData){
            _self.prototype.initDataCallback(_self, jsonData);
        };

        this.getModelEntity = function(){
            _self.prototype.getModelEntity(_self);
        };

        this.getModelEntityCallback = function(jsonData){
            _self.prototype.getModelEntityCallback(_self, jsonData);
        };

        this.setupDefaults = function(defaultValueObj){
            _self.prototype.setupDefaults(_self, defaultValueObj);
            

//            $("#id_" + _self.componentGlobalName).attr("value", _self.modelEntity.id);
//            $("#name_" + _self.componentGlobalName).attr("value", _self.modelEntity.name);
//            $("#code_" + _self.componentGlobalName).attr("value", _self.modelEntity.code);
        };

        this.emptyForm = function(){
            _self.prototype.emptyForm(_self);
        };


        this.saveForm = function(){
            if(!_self.prototype.validateForm(_self)){
                return;
            }

            var params = {
                id: $("#id_" + _self.componentGlobalName).val(),
                code:$("#code_" + _self.componentGlobalName).val(),
                name:$("#name_" + _self.componentGlobalName).val()
            };
            $.extend(_self.modelEntity, params);
            
            $.shout(_self.moduleGlobalName + WacAppConfig.event.app_wac_events_data_save, _self.modelEntity);
        };
        

        this.init();  // init method

    }
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentFormName, false); ?>