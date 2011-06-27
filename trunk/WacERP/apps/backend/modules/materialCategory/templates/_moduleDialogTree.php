<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 * 
 *
 */

include_partial(WacModule::getInstance()->getName("wacCommon")."/".WacComponentList::$moduleDialogTree, array('contextInfo'=>$contextInfo, 'invokeParams'=>$invokeParams));

?>