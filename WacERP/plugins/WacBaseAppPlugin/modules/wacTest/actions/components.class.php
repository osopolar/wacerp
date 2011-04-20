<?php

/**
 * manage the app layout
 */
require_once(dirname(__FILE__).'/../../wacCommon/actions/components.class.php');
class wacTestComponents extends wacCommonComponents
{
    public function executePanelTest($request)
    {
         parent::execute($request);

    }
}
?>