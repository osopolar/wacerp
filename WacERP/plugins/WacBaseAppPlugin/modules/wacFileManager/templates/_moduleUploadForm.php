<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 * 
 *
 */

include_partial(WacModule::getInstance()->getName("wacCommon")."/".WacComponentList::$moduleUploadForm, array('contextInfo'=>$contextInfo, 'invokeParams'=>$invokeParams));

?>