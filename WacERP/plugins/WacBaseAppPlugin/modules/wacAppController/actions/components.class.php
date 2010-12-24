<?php

/**
 * manage the app layout
 */
class wacAppControllerComponents extends WacComponent
{
    public function executeMain($request)
    {
        parent::execute($request);

        $this->getResponse()->addJavaScript($this->getWacComponentJs("layout"), 'last');  // layout
        $this->getResponse()->addJavaScript($this->getWacComponentJs(), 'last');          // main
    }

}