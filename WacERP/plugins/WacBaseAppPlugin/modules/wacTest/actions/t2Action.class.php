<?php

/**
 * test actions.
 *
 * @package    WacERP
 * @subpackage test
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class t2Action extends WacCommonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function execute($request)
  {
    $this->getResponse()->addJavaScript($this->contextInfo["modulePath"].$this->contextInfo["actionName"].".js", 'last');

        //component js required, begin
//
//        //component css required, begin
//        $this->getResponse()->addStylesheet("apps/backend/console/".__CLASS__.".css", 'last');
//        //component css required, begin

//       $this->setLayout("layout");
  }
}
