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
$moduleTreeId = WacModuleHelper::getTreeId($moduleName, $moduleAttachName);
$moduleCaption = WacModule::getInstance()->getCaption($moduleName) . __("List");
//print_r($contextInfo);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleTreeId, true); ?>
<div id="<?php echo $moduleTreeId; ?>"></div>

<script type="text/javascript">
    //<![CDATA[
    $("#<?php echo $moduleTreeId; ?>").ready(function(){
        var moduleName       = <?php echo "'{$moduleName}'" ?>;
        var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
        var modulePrefixId   = '#' + modulePrefixName;
        var moduleTreeId     = '#' + <?php echo "'{$moduleTreeId}'" ?>;
        var moduleCaption    = <?php echo "'{$moduleCaption}'" ?>;


        init();
        bindEvents();

        function init(){};  // init end
         
        function bindEvents(){};  //bindEvnts end

    })
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleTreeId, false); ?>