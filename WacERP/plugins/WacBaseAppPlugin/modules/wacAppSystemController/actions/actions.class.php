<?php

/**
 * appSystemController actions.
 *
 * @package    WacERP
 * @subpackage appSystemController
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacAppSystemControllerActions extends WacCommonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeGetWestMenu(sfWebRequest $request) {
      return OutputHelper::getInstance()->outputXmlFormat(
              $this->getComponent($this->getModuleName(), 'WestMenu', array()), $this);
  }
}
