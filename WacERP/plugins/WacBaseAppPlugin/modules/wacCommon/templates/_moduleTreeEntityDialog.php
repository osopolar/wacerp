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
$componentGlobalName     = WacModuleHelper::getUploadFormId($moduleName, $invokeParams['attachInfo']);
$componentGlobalId       = "#".$componentGlobalName;
$componentCaption        = WacModule::getInstance()->getCaption($moduleName);
$componentFormDialogName = WacModuleHelper::getFormDialogId($moduleName, $invokeParams['attachInfo']);
$componentFormName       = WacModuleHelper::getFormId($moduleName, $invokeParams['attachInfo']);
$cfgDialogDisplay        = (isset($invokeParams['config']['isHidden']) && $invokeParams['config']['isHidden']) ? "display: none;" : "display: inline;";
//print_r($contextInfo);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentFormName, true); ?>
<div id="<?php echo $componentFormDialogName; ?>" style="<?php echo $cfgDialogDisplay; ?>" class="ui-widget" >
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
    $("#<?php echo $componentFormDialogName; ?>").ready(function(){
        var wacImagesPath       = <?php echo "'" . sfConfig::get("app_wac_setting_images_path") . "'" ?>;

        var moduleName          = <?php echo "'{$moduleName}'" ?>;
        var moduleUrl           = WacAppConfig.baseUrl + moduleName + "/";
        var moduleGlobalName    = <?php echo "'{$moduleGlobalName}'" ?>;
        var componentGlobalName = <?php echo "'{$componentGlobalName}'" ?>;
        var componentGlobalId   = <?php echo "'{$componentGlobalId}'" ?>;
        var componentFormDialogId  = '#' + <?php echo "'{$componentFormDialogName}'" ?>;
        var componentCaption    = <?php echo "'{$componentCaption}'" ?>;


        function init(){
            initDialog();
            bindEvents();
        };  // init end

        function initDialog(){
            $(componentFormDialogId).dialog({
                bgiframe: true,
                modal: true,
                width: 560,
                height: 400,
                autoOpen: false,
                buttons: {},
                zIndex: 100
            });
        };

        function bindEvents()
        {
            $(document).hear(componentFormDialogId, moduleGlobalName + WacAppConfig.event.app_wac_events_show_tree_entity_dialog, function ($self, data) {  // listenerid, event name, callback
                Wac.log("componentFormDialogId");
                Wac.log(data);
                $(componentFormDialogId).dialog('open');
            });

            $( componentFormDialogId).bind( "dialogclose", function(event, ui) {
                $.shout(moduleGlobalName + WacAppConfig.event.app_wac_events_action_canceled, {});
            });

            // fix dialog div didnt remove bug, remove it by this way
            var uiPanelId = WacEntity.module.getUiPanelId(moduleName);
            $("#wacAppSystemController").unbind('tabsremove');
            $("#wacAppSystemController").bind('tabsremove', function(event, ui) {
//               Wac.log("ui.panel.id:" + ui.panel.id + " : " + uiPanelId);
                if(ui.panel.id == uiPanelId)
                {
                    $(componentFormDialogId).remove();  //remove dialog form
                }
            });
        };  //bindEvnts end

        init();

    })
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentFormName, false); ?>