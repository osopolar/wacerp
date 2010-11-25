<?php

/**
 * manage the app layout
 */
class wacAppTestControllerComponents extends WacComponent
{
    public function executeMain($request)
    {
        parent::execute($request);

        $this->getResponse()->addJavaScript($this->getWacComponentJs("layout"), '');
        $this->getResponse()->addJavaScript($this->getWacComponentJs(), '');
    }

}