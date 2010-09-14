<?php

/**
 * manage the app layout
 */
class appSystemControllerComponents extends WacComponent
{
    
    public function executeMain($request)
    {
        parent::execute($request);

        $this->getResponse()->addJavaScript($this->getComponentJs("layout"), 'last');
        $this->getResponse()->addJavaScript($this->getComponentJs(), 'last');
    }

}