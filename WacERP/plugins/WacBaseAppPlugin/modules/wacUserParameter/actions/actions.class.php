<?php

/**
 * wacUserParameterActions actions.
 *
 * @package    Wac
 * @subpackage country
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class wacUserParameterActions extends WacModuleAction
{
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    /*
     * override filter list
     */
    public function filterList($listObjs) {
        $filterArr = array();
        if (count($listObjs) > 0) {
            foreach ($listObjs as $listObj) {
                $tmpArr = $listObj->toArray();
                $tmpArr['type'] = $this->i18n->__(WacDataType::getInstance()->getCaptionById($listObj->getType()));

                $filterArr[] = $tmpArr;
            }
        }

        return $filterArr;
    }

    /*
   * @return process result data array
    */
    public function executeEdit(sfWebRequest $request) {
//        $this->forward("wacUserParameter", "test");
        $reqParams = $this->getRequest()->getParameterHolder()->getAll();
$userParams = $this->getUser()->getAttributeHolder()->getAll();
print_r($userParams);
        if(isset($reqParams["setting"])){
            foreach ($reqParams["setting"]["display"] as $k => $v) {
                $code = "setting/display/{$k}";
                $objParamater = $this->mainModuleTable->getOneByCode($code, false);
                if (empty($objParamater)) {
                    $objParamater = $this->mainModuleTable->create();
                }

                if($objParamater->getValue() != $v){
                    $objParamater->setCode($code);
                    $objParamater->setValue($v);
                    $objParamater->setUserId($this->wacGuardUser->getId());
                    $objParamater->setType(0);
                    $objParamater->save();
                }
            }
        }

        $resultSet = JqGridDataHelper::getInstance()->getCommonDatum();
        $succInfo = JsCommonData::getSuccessDatum(
                        Doctrine::getTable(WacTable::$wacSysmsg)->getContentByCode("sys_edit_succ")
        );
        $resultSet[JqGridDataHelper::$KEY_USER_DATA] = $succInfo;
        $resultSet['info'] = $succInfo;

        $this->afterEdit($request);
        return OutputHelper::getInstance()->output($resultSet, $this);
    }

}