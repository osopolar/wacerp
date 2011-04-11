<?php
/*
 * notes:
 *   this tpl 
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 */
include_partial(WacModule::getInstance()->getName("wacCommon")."/".WacComponentList::$baseInlineTableA, array('contextInfo'=>$contextInfo, 'invokeParams'=>$invokeParams));
?>