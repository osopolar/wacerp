<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName  = $invokeParams['contextInfo']['moduleName'];

//print_r($contextInfo);
?>
<span id="<?php echo $moduleName;?>_toolbar">
    <input id="<?php echo $moduleName; ?>_btnPrint" type="button" value="<?php echo __("Print"); ?>" />
    <input id="<?php echo $moduleName; ?>_btnClose" type="button" value="<?php echo __("Close"); ?>" />
</span>