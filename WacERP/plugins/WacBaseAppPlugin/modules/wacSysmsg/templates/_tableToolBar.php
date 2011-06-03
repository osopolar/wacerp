<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */
include_partial(WacModule::getInstance()->getName("wacCommon")."/".WacComponentList::$moduleToolBar, array('contextInfo'=>$contextInfo, 'invokeParams'=>$invokeParams));
?>