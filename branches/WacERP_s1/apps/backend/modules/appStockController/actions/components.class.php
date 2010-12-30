<?php

/**
 * manage the app layout
 */
class appStockControllerComponents extends WacComponent
{
    // component main is defined in parent class
    // component layout is defined in parent class

    public function executeLayout($request)
    {
        $this->execute($request);
        $this->getResponse()->addJavaScript($this->getComponentJs(), '');  // layout
    }
}