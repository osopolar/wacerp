<?php

/**
 * wacGuardGroup actions.
 *
 * @package    WacStorehouse
 * @subpackage wacGuardGroup
 * @author     JianBinBi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacGuardGroupActions extends WacCommonActions
{
  /*
   * override filter list
   */
  public function filterList($listObjs)
  {
      $filterArr = array();
      if(count($listObjs) > 0)
      {
          foreach($listObjs as $listObj)
          {
              $tmpArr = $listObj->toArray();
              $tmpArr['permissions_names'] = $listObj->getPermissionsNames();        

              $filterArr[] = $tmpArr;
          }
      }

      return $filterArr;
  }

  /*
   * @return inspect result
   */
  public function inspectDataValidation(sfWebRequest $request, $params=array())
  {
      $result    = JsCommonData::getSuccessDatum();
      $reqParams = $request->getParameterHolder()->getAll();


      $id = isset($reqParams['id']) ? $reqParams['id'] : 0;
      if($this->mainModuleTable->isExistedName($reqParams['name'], $id))
      {
         $result = JsCommonData::getErrorDatum(WacErrorCode::getInfo(WacErrorCode::$duplicatedName, $reqParams['name']), WacErrorCode::$duplicatedName);
         return $result;
      }

//      if($this->mainModuleTable->isExistedName($reqParams['name'], $id))
//      {
//         $result = JsCommonData::getErrorDatum(WacErrorCode::getInfo(WacErrorCode::$duplicatedName, $reqParams['name']), WacErrorCode::$duplicatedName);
//         return $result;
//      }
      return $result;
  }

  /*
   * @return list data array
   */
  public function executeAdd(sfWebRequest $request)
  {
      $resultSet = JsCommonData::getCommonDatum();
      $inspectResult = $this->inspectDataValidation($request);
      if($inspectResult['status'] == WacOperationStatus::$Error)
      {
          $resultSet['info'] = $inspectResult;
      }
      else
      {
          $reqParams    = $this->getRequest()->getParameterHolder()->getAll();
          $targetItem   = $this->mainModuleTable->create();

          if(count($reqParams)>0) {
//              $targetItem->set($reqParams['']);
              if(isset($reqParams['name'])) {$targetItem->setName($reqParams['name']);}
              if(isset($reqParams['description'])) {$targetItem->setDescription($reqParams['description']);}

              if(isset($reqParams['permission_list']) && count($reqParams['permission_list'])>0)
              {
                  $targetItem->link('permissions', $reqParams['permission_list']);
              }
              
              $targetItem->save();

              $this->afterAdd($request, $targetItem);  //log

          }

          $resultSet['items'][0] = $targetItem->toArray();
          $resultSet['info']     = JsCommonData::getSuccessDatum(
                                       Doctrine::getTable(WacTable::$wacSysmsg)->getContentByCode("sys_add_succ")
                                   );
      }

      return OutputHelper::getInstance()->output($resultSet, $this);

  }

  /*
   * @return list data array
   */
  public function executeEdit(sfWebRequest $request)
  {
      // forward to 404 if no id
      $this->forward404Unless($request->hasParameter('id'));

      $resultSet = JsCommonData::getCommonDatum();
      $inspectResult = $this->inspectDataValidation($request);
      if($inspectResult['status'] == WacOperationStatus::$Error)
      {
          $resultSet['info'] = $inspectResult;
      }
      else
      {
          $reqParams  = $this->getRequest()->getParameterHolder()->getAll();
          $targetItem = $this->mainModuleTable->findOneById($request->getParameter('id'));

          if(count($reqParams)>0) {
              $targetItem->unlink('permissions');
              
              if(isset($reqParams['name'])) {$targetItem->setName($reqParams['name']);}
              if(isset($reqParams['description'])) {$targetItem->setDescription($reqParams['description']);}

              if(isset($reqParams['permission_list']) && count($reqParams['permission_list'])>0)
              {
                  $targetItem->link('permissions', $reqParams['permission_list']);
              }

              $targetItem->save();

              $this->afterEdit($request, $targetItem);  // log
          }

          $resultSet['items'][0] = $targetItem->toArray();
          $resultSet['info']     = JsCommonData::getSuccessDatum(
                                       Doctrine::getTable(WacTable::$wacSysmsg)->getContentByCode("sys_edit_succ")
                                   );
      }

      return OutputHelper::getInstance()->output($resultSet, $this);

  }

  /*
   * @return list data array
   */
  public function executeGetFormData(sfWebRequest $request)
  {
      $resultSet = JsCommonData::getCommonDatum();
      $resultSet['info'] = JsCommonData::getSuccessDatum();

      $resultSet['items']['permission'] = Doctrine::getTable(WacTable::$wacGuardPermission)->getIdDescriptionHash();

      if($request->hasParameter('id'))
      {
          $targetItem = $this->mainModuleTable->findOneById($request->getParameter('id'));
          $resultSet['items']['group_permission'] = $targetItem->getPermissionsIds(true);
      }
      else
      {
          $resultSet['items']['group_permission'] = array();
      }

//      $resultSet['items']['default']['currency_code_name'] = Doctrine::getTable(WacTable::$systemParameter)->getValueByCode(WacAppSettingCode::$currency);

      return OutputHelper::getInstance()->output($resultSet, $this);

  }

}
