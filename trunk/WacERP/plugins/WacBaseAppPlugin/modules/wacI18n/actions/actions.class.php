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
//      $i18n = $this->getContext()->getI18N();
//      $i18nMessageFormat = $i18n->getMessageFormat();

      $wacI18nHelper = WacI18nHelper::getInstance();
      return OutputHelper::getInstance()->output($wacI18nHelper->getJsMessages($this), $this);
//      return $this->renderText(print_r($wacI18nHelper->getJsMessages($this),true));

//      $text = <<<EOD
//# This line is ignored by the plugin
//msg_hello = Hello
//msg_world = World
//msg_complex = Good morning {0}!
//EOD;
//      $text = $i18n->getCulture();
//      $this->getUser()->setCulture("en_US");
//      $i18n->__("");
//      $i18n->__("", null, "messages-js");
//      $text = $i18nMessageFormat->getSource()->read();
//      return $this->renderText(print_r($text,true));
//      return OutputHelper::getInstance()->output($text, $this);

  }

}
