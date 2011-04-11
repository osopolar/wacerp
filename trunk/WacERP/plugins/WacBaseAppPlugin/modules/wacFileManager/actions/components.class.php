<?php

/**
 * manage the app layout
 */
require_once(dirname(__FILE__).'/../../wacCommon/actions/components.class.php');
class wacFileManagerComponents extends wacCommonComponents
{
    public function executeFileManagerWidget($request)
    {
        $this->execute($request);
    }


}