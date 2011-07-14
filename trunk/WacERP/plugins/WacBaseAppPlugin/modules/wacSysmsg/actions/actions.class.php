<?php

/**
 * wacSysmsgActions actions.
 *
 * @package    Wac
 * @subpackage country
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class wacSysmsgActions extends WacModuleAction
{
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

        if($this->mainModuleTable->isExistedCode($reqParams['code'], $id)) {
            $result = JsCommonData::getErrorDatum(Doctrine::getTable(WacTable::$wacSysmsg)->getErrContent("sys_err_duplicated_code", array($reqParams['code'])), WacErrorCode::$duplicatedName);
            return $result;
        }

        return $result;
    }
    
}