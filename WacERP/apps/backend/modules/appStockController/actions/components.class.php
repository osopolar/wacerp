<?php

/**
 * manage the app layout
 */
class appStockControllerComponents extends WacComponent
{
    
    public function executeLayout($request)
    {
        parent::execute($request);

        $this->getResponse()->addJavaScript($this->getComponentJs(), 'last');
    }
}