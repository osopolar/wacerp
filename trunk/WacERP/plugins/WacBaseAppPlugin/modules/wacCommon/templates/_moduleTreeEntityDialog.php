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
<div id="<?php echo $componentGlobalName; ?>" style="<?php echo $cfgDialogDisplay; ?>" class="ui-widget" >
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
            <input name="btnClose" id="btnClose_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Close"); ?>"/>
        </div>

        <input type="hidden" name="id" id="id_<?php echo $componentGlobalName ?>" value="0"/>
    </form>
</div>

<script type="text/javascript">
    //<![CDATA[
    /*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

    /***** init section, begin *****/
    $("<?php echo $componentGlobalId; ?>").ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });

    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;
        this.prototype      = new WacBasicFormPrototype();  // extends WacFormPrototype
        this.prototype.constructor = this;

        this.appControllerId   = "wacAppController";  // be used to listen tab-remove event of the controller
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

        this.modelEntity    = {};  // map to current data model entity
        this.inputMode      = WacEntity.formInputMode.add;

        this.init = function(){
            _self.prototype.init(_self);
        };

        this.initLayout = function(){
            _self.prototype.initLayout(_self);

            $(componentFormDialogId).dialog({
                bgiframe: true,
                modal: true,
                width: 460,
                height: 250,
                autoOpen: false,
                buttons: {},
                zIndex: 100
            });
        };

        this.initForm = function(){
            _self.prototype.initForm(_self);
        };

        this.bindEvents = function(){
            _self.prototype.bindEvents(_self);

            $(document).hear(componentFormDialogId, moduleGlobalName + WacAppConfig.event.app_wac_events_show_tree_entity_dialog, function ($self, data) {  // listenerid, event name, callback
                Wac.log("componentFormDialogId");
                Wac.log(data);
                $(componentFormDialogId).dialog('open');
            });

//            $( componentFormDialogId).bind( "dialogclose", function(event, ui) {
//                $.shout(moduleGlobalName + WacAppConfig.event.app_wac_events_action_canceled, {});
//            });
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
//            if(_self.inputMode == WacEntity.formInputMode.add)   // use default values
//            {
//                $("#id_" + _self.componentGlobalName).attr("value", 0);
//            }
//            else  // use edit obj values
//            {
//                $("#id_" + _self.componentGlobalName).attr("value", _self.modelEntity.id);
//                $("#username_" + _self.componentGlobalName).attr("value", _self.modelEntity.username);
//                $("#password_" + _self.componentGlobalName).attr("value", "000000");
//                $("#password_confirm_" + _self.componentGlobalName).attr("value", "000000");
//                $("#is_active_" + _self.componentGlobalName).attr("checked", (_self.modelEntity.is_active=='true'));
//                //            Wac.log(_self.modelEntity);
//            }
//
//            _self.prototype.setupDefaults(_self, defaultValueObj);
        };

        this.init();  // init method

    }
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentFormName, false); ?>