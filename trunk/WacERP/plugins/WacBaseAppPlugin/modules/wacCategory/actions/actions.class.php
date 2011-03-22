<?php

/**
 * wacCategory actions.
 *
 * @package    Wac
 * @subpackage wacCategory
 * @author     JianBinBi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacCategoryActions extends WacTreeActions {

    public function preExecute() {
        parent::preExecute();
        $this->mainModuleTable->setCustomFilter(array("user_id" => $this->getUser()->getGuardUser()->getId()));
    }
    

}
