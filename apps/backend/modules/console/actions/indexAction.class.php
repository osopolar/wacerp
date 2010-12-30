<?php
/**
 * main
 * @package    
 * @author     ben
 */
class indexAction extends WacCommonActions
{
    public function execute($request)
    {   
        //component js required, begin
//        $this->getResponse()->addJavaScript("apps/backend/console/".$this->getActionName().".js", 'last');

//        $this->getResponse()->addJavaScript($this->actionPath.".js", 'last');

        //component js required, begin
//
//        //component css required, begin
//        $this->getResponse()->addStylesheet("apps/backend/console/".__CLASS__.".css", 'last');
//        //component css required, begin

       $this->setLayout("layout");
    }
}