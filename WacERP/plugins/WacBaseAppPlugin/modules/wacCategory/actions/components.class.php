<?php

/**
 * manage the app layout
 */
require_once(dirname(__FILE__).'/../../wacCommon/actions/components.class.php');
class wacCategoryComponents extends wacCommonComponents
{
    public function executeCategoryManagerWidget($request)
    {
        $this->execute($request);
    }
}