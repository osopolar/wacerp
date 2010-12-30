<?php

/**
 * manage the app layout
 */
class wacAppSystemControllerComponents extends WacComponent
{
    
    public function executeWestMenu($request)
    {
        parent::execute($request);

        $this->user = $this->getUser();
    }

}