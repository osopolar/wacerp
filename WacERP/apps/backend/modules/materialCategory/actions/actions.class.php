<?php

/**
 * materialCategory actions.
 *
 * @package    Wac
 * @subpackage materialCategory
 * @author     JianBinBi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class materialCategoryActions extends WacTreeActions {

    public function preExecute() {
        parent::preExecute();
        $this->mainModuleTable->setCustomFilter(array("user_id" => $this->getUser()->getGuardUser()->getId()));
    }

    /*
     * override parent method to map the corresponding module table
     */
    public function getModuleTableName() {
        return WacModuleHelper::getModuleTableName($this->innerContextInfo["moduleName"], "WacMaterialCategory");
    }

     /*
     * _mapData
     *
     * canbe override by children method, to know which data should be update/insert, apply for different module/tables
     */

    protected function _mapData(sfWebRequest $request, $params=array()) {
        $_params = array();

        if($request->hasParameter("name")) {
            $_params["name"] = $request->getParameter("name");
        }

        if($request->hasParameter("code")) {
            $_params["code"] = $request->getParameter("code");
        }

//        $this->getLogger()->log(print_r($_params, true));
        return parent::_mapData($request, $_params);
    }

}
