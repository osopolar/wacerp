<?php

/**
 * WacCommonActions actions.
 *
 * Descriptions: provides common methods for wac action
 *
 * @package    Wac
 * @subpackage lib
 * @author     ben
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
abstract class WacModuleAction extends WacCommonActions {
    /*
     * setup main module table
     */
    public function setupMainModuleTable(){
        $this->mainModuleTable = Doctrine::getTable(ucfirst($this->getModuleName()));
    }
}