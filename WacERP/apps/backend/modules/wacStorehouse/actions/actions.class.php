<?php

/**
 * wacStorehouse actions.
 *
 * @package    WacERP
 * @subpackage wacStorehouse
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacStorehouseActions extends WacModuleAction
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
}
