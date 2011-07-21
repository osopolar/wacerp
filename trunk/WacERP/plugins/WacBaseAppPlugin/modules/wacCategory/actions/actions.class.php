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

    /*
    * @return
    */
    public function inspectDataValidation(sfWebRequest $request, $params=array()) {
        $result    = JsCommonData::getSuccessDatum();
        $reqParams = $request->getParameterHolder()->getAll();

        $id = 0;
        if(isset($params["opType"]) && $params["opType"]==WacOperationType::$edit){
            $id = ($reqParams['id']!=JqGridDataHelper::$KEY_EMPTY) ? $reqParams['id'] : 0;
        }

        if($this->mainModuleTable->isExistedAttribute("caption", $reqParams['caption'], $id)){
            $result = JsCommonData::getErrorDatum($this->getSysMsg("sys_err_duplicated_name", array($reqParams['caption'])), WacErrorCode::$duplicatedName);
            return $result;
        }
        
        return $result;
    }
    

}
