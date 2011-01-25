<?php

/**
 * print actions.
 *
 * @package    WacStorehouse
 * @subpackage print
 * @author     JianBinBi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class printActions extends WacCommonActions
{    
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
//    $this->forward('default', 'module');
      // forward to 404 if no id
//      $this->forward404Unless($request->hasParameter('pModule'));
//      $this->forward404Unless($request->hasParameter('pAction'));

      $this->invokeParams = $this->getRequest()->getParameterHolder()->getAll();
//      $this->invokeParams['path'] = $request->getParameter('pModule')."/".$request->getParameter('pAction');
//      $this->invokeParams['height'] = $request->hasParameter('height') ? $request->getParameter('height') : "680px;";
      
  }

  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeForm(sfWebRequest $request)
  {
      // forward to 404 if no id
      $this->forward404Unless($request->hasParameter('pModule'));
      $this->forward404Unless($request->hasParameter('pAction'));
      $this->forward404Unless($request->hasParameter('id'));

      $this->forward("print", "index");

  }
}
