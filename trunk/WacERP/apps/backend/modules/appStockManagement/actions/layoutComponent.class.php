<?php
/**
 * manage the app layout
 */
class layoutComponent extends WacComponent
{
    public function execute($request)
    {
        parent::execute($request);
        
        $this->getResponse()->addJavaScript($this->getComponentJs(), 'last');
    }
}