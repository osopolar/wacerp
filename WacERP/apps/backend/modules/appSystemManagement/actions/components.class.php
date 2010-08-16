<?php

/**
 * manage the app layout
 */
class appSystemManagementComponents extends WacComponent
{
    
    public function executeLayout($request)
    {
        parent::execute($request);

        $this->getResponse()->addJavaScript($this->getComponentJs(), 'last');
    }
}