<?php

/**
 * unit actions.
 *
 * @package    WacModule
 * @subpackage unit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class unitActions extends WacCommonActions
{
    /**
   * Executes an application defined process prior to execution of this sfAction object.
   *
   * By default, this method is empty.
   */
  public function preExecute()
  {
      $module = sfContext::getInstance()->getRequest()->getParameter("module");
      $this->mainModuleTable = Doctrine::getTable(BizTable::$$module);
  }
}