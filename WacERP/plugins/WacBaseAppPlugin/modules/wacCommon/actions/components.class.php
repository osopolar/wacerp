<?php

/**
 * manage the app layout
 */
class wacCommonComponents extends WacComponent
{
    public function executeAppBar($request)
    {
         parent::execute($request);
         $this->user = $this->getUser();
    }

    public function executeMasterControlTableA($request)
    {
         parent::execute($request);
    }

}