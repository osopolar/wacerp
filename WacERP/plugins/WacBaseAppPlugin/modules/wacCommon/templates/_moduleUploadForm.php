<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName = $invokeParams['attachInfo']['name'];
$modulePrefixName = $invokeParams['contextInfo']['moduleName'] . $invokeParams['attachInfo']['name'];
$moduleFormId = WacModuleHelper::getFormId($moduleName, $moduleAttachName);
$moduleCaption = WacModule::getInstance()->getCaption($moduleName) . __("List");
//print_r($invokeParams['contextInfo']);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleFormId, true); ?>
<div id="<?php echo $moduleFormId; ?>" class="wacTreeFrame"></div>

<script type="text/javascript">
    //<![CDATA[
    $("#<?php echo $moduleFormId; ?>").ready(function(){
        var wacImagesPath    = <?php echo "'" . sfConfig::get("app_wac_setting_images_path") . "'" ?>;

        var moduleName       = <?php echo "'{$moduleName}'" ?>;
        var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
        var modulePrefixId   = '#' + modulePrefixName;
        var moduleTreeId     = '#' + <?php echo "'{$moduleFormId}'" ?>;
        var moduleCaption    = <?php echo "'{$moduleCaption}'" ?>;
        var moduleUrl        = WacAppConfig.baseUrl + moduleName + "/";


        init();
        bindEvents();

        function init(){
            
        };  // init end
         
        function bindEvents(){};  //bindEvnts end

    })
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleFormId, false); ?>