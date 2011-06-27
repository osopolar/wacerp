<?php

/**
 * manage the app layout
 */
require_once(sfConfig::get("app_wac_plugin_module_common_actions_dir").'/components.class.php');
class materialCategoryComponents extends wacCommonComponents
{
    public function executeCategoryManagerWidget($request)
    {
        $this->execute($request);
    }
}