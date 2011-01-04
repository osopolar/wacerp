<?php

/**
 * wacI18n actions.
 *
 * @package    WacERP
 * @subpackage wacI18n
 * @author     JianBinBi <jianbinbi@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacI18nActions extends WacCommonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->forward404();
  }

  public function executeGetTransForJS(sfWebRequest $request)
  {
      $wacI18nHelper = WacI18nHelper::getInstance();
      return OutputHelper::getInstance()->output($wacI18nHelper->getJsMessages($this), $this);
  }

}
