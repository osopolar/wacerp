<?php

/**
 * manage the app layout
 */
class wacAppSystemControllerComponents extends WacComponent
{
    
    public function executeMain($request)
    {
        parent::execute($request);

        $this->getResponse()->addJavaScript($this->getComponentJs("layout"), '');
        $this->getResponse()->addJavaScript($this->getComponentJs(), '');
    }

    public function executeWestMenu($request)
    {
        parent::execute($request);

        $this->user = $this->getUser();
    }

}