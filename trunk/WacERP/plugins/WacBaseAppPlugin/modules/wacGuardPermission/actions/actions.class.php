<?php

/**
 * wacGuardPermission actions.
 *
 * @package    Wac
 * @subpackage wacGuardPermission
 * @author     JianBinBi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacGuardPermissionActions extends WacModuleAction {
    /*
     * @return inspect result
     */

    public function inspectDataValidation(sfWebRequest $request, $params=array()) {
        $result = JsCommonData::getSuccessDatum();
        $reqParams = $request->getParameterHolder()->getAll();

        $id = ($reqParams['id'] != JqGridDataHelper::$KEY_EMPTY) ? $reqParams['id'] : 0;
        if ($this->mainModuleTable->isExistedName($reqParams['name'], $id)) {
            $result = JsCommonData::getErrorDatum(WacErrorCode::getInstance()->getInfo(WacErrorCode::$duplicatedName, $reqParams['name']), WacErrorCode::$duplicatedName);
            return $result;
        }

        return $result;
    }

    /*
     * override filter list
     */

    public function filterList($listObjs) {
        $filterArr = array();
        if (count($listObjs) > 0) {
            foreach ($listObjs as $listObj) {
                $tmpArr = $listObj->toArray();
//                $tmpArr['permissions_names'] = $listObj->getPermissionsNames();

                $filterArr[] = $tmpArr;
            }
        }

        return $filterArr;
    }

}
