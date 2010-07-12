<?php
/**
 * main
 * @package    
 * @author     ben
 */
class indexAction extends sfAction
{
    public function execute($request)
    {
        // no escaping func for this action
        sfConfig::set("sf_escaping_strategy", false);
        
        
        //component js required, begin
        $this->getResponse()->addJavaScript("apps/backend/console/".__CLASS__.".js", 'last');
        //component js required, begin
//
//        //component css required, begin
//        $this->getResponse()->addStylesheet("apps/backend/console/".__CLASS__.".css", 'last');
//        //component css required, begin

       $this->setLayout("layout");
    }
}