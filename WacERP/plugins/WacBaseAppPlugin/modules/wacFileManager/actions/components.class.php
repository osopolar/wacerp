<?php

/**
 * manage the app layout
 */
//require_once(dirname(__FILE__).'/../../wacCommon/actions/components.class.php');
require_once(sfConfig::get("app_wac_plugin_module_common_actions_dir").'/components.class.php');
class wacFileManagerComponents extends wacCommonComponents
{
    public function executeFileManagerWidget($request)
    {
        $this->execute($request);
    }


}