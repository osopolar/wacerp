<?php

/**
 * wacGuardUser actions.
 *
 * @package    Wac
 * @subpackage wacGuardUser
 * @author     JianBinBi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacGuardUserActions extends WacModuleAction
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
              $tmpArr['groups_names'] = $listObj->getGroupsDescription();
              $tmpArr['status'] = $this->i18n->__(WacEntityStatus::getInstance()->getActiveCaption($listObj->getIsActive()));

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
      if($this->mainModuleTable->isExistedName($reqParams['username'], $id))
      {
         $result = JsCommonData::getErrorDatum($this->getSysMsg("sys_err_duplicated_name", array($reqParams['username'])), WacErrorCode::$duplicatedName);
         return $result;
      }
      
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
              if(isset($reqParams['password']))      {$targetItem->setPassword($reqParams['password']);}
              if(isset($reqParams['username']))      {$targetItem->setUsername($reqParams['username']);}
              $targetItem->setIsActive(isset($reqParams['is_active'])?1:0);
              if(isset($reqParams['user_group_list']) && count($reqParams['user_group_list'])>0)
              {
                  $targetItem->link('groups', $reqParams['user_group_list']);
              }
              
              $targetItem->save();
              $targetItem->initRelatedInfo();  // init related data info

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
              if(isset($reqParams['password']) && $reqParams['password']!="000000") {$targetItem->setPassword($reqParams['password']);}
              if(isset($reqParams['username'])) {$targetItem->setUsername($reqParams['username']);}
              $targetItem->setIsActive(isset($reqParams['is_active'])?1:0);

              $targetItem->unlink('groups');
              
              if(isset($reqParams['user_group_list']) && count($reqParams['user_group_list'])>0)
              {
                  $targetItem->link('groups', $reqParams['user_group_list']);
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

      $resultSet['items']['group'] = Doctrine::getTable(WacTable::$wacGuardGroup)->getIdDescriptionHash();

      if($request->hasParameter('id'))
      {
          $targetItem = $this->mainModuleTable->findOneById($request->getParameter('id'));
          $resultSet['items']['user_group'] = $targetItem->getGroupsIds(true);
      }
      else
      {
          $resultSet['items']['user_group'] = array();
      }

//      $resultSet['items']['default']['currency_code_name'] = Doctrine::getTable(WacTable::$systemParameter)->getValueByCode(WacAppSettingCode::$currency);

      return OutputHelper::getInstance()->output($resultSet, $this);

  }

}
