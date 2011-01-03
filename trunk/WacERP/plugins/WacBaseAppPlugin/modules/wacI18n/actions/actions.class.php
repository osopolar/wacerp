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
      return OutputHelper::getInstance()->debugRequest($this);
//      $text = <<<EOD
//# This line is ignored by the plugin
//msg_hello = Hello
//msg_world = World
//msg_complex = Good morning {0}!
//EOD;
//      return $this->renderText($text);
  }

}
