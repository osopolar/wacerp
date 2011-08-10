<?php

/**
 * wacAppController actions.
 *
 * @package    WacERP
 * @subpackage wacAppController
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacAppControllerActions extends WacModuleAction {

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
