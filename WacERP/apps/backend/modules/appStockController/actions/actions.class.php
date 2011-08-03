<?php

/**
 * appStockController actions.
 *
 * @package    WacERP
 * @subpackage appStockController
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class appStockControllerActions extends WacModuleAction {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    /*
     * a switch setting, if some module not allow, override this and return false;
     */
    public function allowSetupMainModuleTable() {
        return false;
    }

}
