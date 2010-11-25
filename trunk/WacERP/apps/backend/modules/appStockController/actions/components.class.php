<?php

/**
 * manage the app layout
 */
class appStockControllerComponents extends WacComponent
{
    public function executeMain($request)
    {
        parent::execute($request);

        $this->getResponse()->addJavaScript($this->getComponentJs("layout"), '');
        $this->getResponse()->addJavaScript($this->getComponentJs(), '');
    }

}