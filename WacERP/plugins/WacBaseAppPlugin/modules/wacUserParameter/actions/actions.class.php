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
        // forward to 404 if no id
        $this->forward404Unless($request->hasParameter('id'));

        $inspectResult = $this->inspectDataValidation($request, array("opType"=>WacOperationType::$edit));
        $resultSet = JqGridDataHelper::getInstance()->getCommonDatum();
        if($inspectResult['status'] == WacOperationStatus::$Error) {
            $resultSet[JqGridDataHelper::$KEY_USER_DATA] = $inspectResult; // for compatibility JqGrid tips
            $resultSet['info'] = $inspectResult;
        }
        else {

            $exceptFields = array("id");
            $reqParams    = $this->filterInput();
            $targetItem   = $this->mainModuleTable->findOneById($request->getParameter('id'));

            $succInfo = JsCommonData::getSuccessDatum(
                            Doctrine::getTable(WacTable::$wacSysmsg)->getContentByCode("sys_edit_succ")
            );
            $resultSet[JqGridDataHelper::$KEY_USER_DATA] = $succInfo;
            $resultSet['info'] = $succInfo;

            if(count($reqParams)>0) {
                foreach($reqParams as $key => $value) {
                    if($this->mainModuleTable->hasColumn($key) and !in_array($key, $exceptFields)) {
                        $accessor = "set".ucfirst($key);
                        $targetItem->$accessor($value);
                    }
                }
                $targetItem->save();

                $this->afterEdit($request);
            }
        }
        return OutputHelper::getInstance()->output($resultSet, $this);
    }

}