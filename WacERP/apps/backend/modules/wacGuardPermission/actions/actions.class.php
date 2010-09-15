<?php

/**
 * wacGuardPermission actions.
 *
 * @package    WacStorehouse
 * @subpackage wacGuardPermission
 * @author     JianBinBi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacGuardPermissionActions extends WacCommonActions
{
    /*
   * @return inspect result
    */
    public function inspectDataValidation(sfWebRequest $request, $params=array()) {
        $result    = JsCommonData::getSuccessDatum();
        $reqParams = $request->getParameterHolder()->getAll();

        $id = ($reqParams['id']!=JqGridDataHelper::$KEY_EMPTY) ? $reqParams['id'] : 0;
        if($this->mainModuleTable->isExistedName($reqParams['name'], $id)) {
            $result = JsCommonData::getErrorDatum(WacErrorCode::getInfo(WacErrorCode::$duplicatedName, $reqParams['name']), WacErrorCode::$duplicatedName);
            return $result;
        }

        return $result;
    }
}
