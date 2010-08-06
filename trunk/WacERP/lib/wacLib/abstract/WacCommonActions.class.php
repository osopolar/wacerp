<?php
/**
 * WacCommonActions actions.
 *
 * @package    WacStorehouse
 * @subpackage lib
 * @author     ben
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
abstract class WacCommonActions extends sfActions
{
  public $actionPath = "";
  public $moduleName = "";
  public $mainModuleTable = null;
  public $wacLogger = null;

  /**
   * Executes an application defined process prior to execution of this sfAction object.
   *
   * By default, this method is empty.
   */
//  public function preExecute() {
//      $this->wacLogger = WacLogger::getInstance();
//      sfContext::getInstance()->getConfiguration()->loadHelpers("Date");
//  }

  public function preExecute()
  {
      $this->moduleName = $this->getModuleName();
      $this->actionPath = 'apps'.'/'.$this->getContext()->getConfiguration()->getApplication().'/'.$this->moduleName.'/'.$this->getActionName();
//      $moduleName = $this->moduleName;
//      if(isset(WacTable::$$moduleName))
//      {
//          $this->mainModuleTable = Doctrine::getTable(WacTable::$$moduleName);
//      }
//      $this->wacLogger = WacLogger::getInstance();
//      sfContext::getInstance()->getConfiguration()->loadHelpers("Date");
  }

  /*
   *  return internal path of the request
   */
  public function getInternalPath()
  {
      return $this->getContext()->getConfiguration()->getApplication()."/".$this->getModuleName()."/".$this->getActionName();
  }

  /*
   * adopt other js/css for pring action
   */
  public function initPrintInclusion()
  {
        // js required
        $this->getResponse()->addJavaScript('jquery/jquery-1.3.2.min.js', 'last');
        $this->getResponse()->addJavaScript('jquery/jquery-ui-1.7.2.min.js', 'last');
        $this->getResponse()->addJavaScript('jquery/jquery.printElement.js', 'last');
        $this->getResponse()->addJavaScript('jquery/jquery.dump.js', 'last');
        $this->getResponse()->addJavaScript('backend/printer/indexAction.js', 'last');
        $this->getResponse()->addJavaScript('wac_common.js', 'last');
        $this->getResponse()->addJavaScript('wac_debug.js', 'last');


        // css required
        $this->getResponse()->addStylesheet("jquery/jqueryUI/themes/smoothness/jquery-ui-1.7.2.custom.css", 'last', array("media"=>"screen"));
//        $this->getResponse()->addStylesheet("jquery/jqueryUI/themes/cupertino/jquery-ui-1.7.2.custom.css", 'last', array("media"=>"screen"));
//        $this->getResponse()->addStylesheet("jquery/jqueryUI/themes/sunny/jquery-ui-1.7.2.custom.css", 'last', array("media"=>"screen"));

//        $this->getResponse()->addStylesheet("blueprint/screen.css", 'last', array("media"=>"screen, projection"));
        $this->getResponse()->addStylesheet("blueprint/print.css", 'last', array("media"=>"print"));
//        $this->getResponse()->addStylesheet("blueprint/ie.css", 'last', array("media"=>"screen, projection"));
  }

  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      ;
  }

  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeNewListIndex(sfWebRequest $request)
  {
      ;
  }

  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeAuditedListIndex(sfWebRequest $request)
  {
      ;
  }

  /**
  * Executes getAuditedList action
  *
  * @param sfRequest $request A request object
  */
  public function executeGetAuditedList(sfWebRequest $request)
  {
      ;
  }

  /**
  * filter list
  *   canbe override by children to filter/process the resultSet
  * @param $resultSet
   * @return array result
  */
  protected function filterList($listObjs)
  {
      return $listObjs->toArray();
  }

  /*
   * @return list data array
   */
  public function executeGetList(sfWebRequest $request)
  {
      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }

      
      $jqGridDataHelper = JqGridDataHelper::getInstance();

      if(($request->hasParameter(JqGridDataHelper::$KEY_SEARCH_FIELD) && ($request->getParameter(JqGridDataHelper::$KEY_SEARCH_FIELD)!="")) || $request->hasParameter(JqGridDataHelper::$KEY_SIDX))
      {
          $arrParam = array();

          if($request->hasParameter(JqGridDataHelper::$KEY_SEARCH_FIELD) && $request->getParameter(JqGridDataHelper::$KEY_SEARCH_OPER)!="")
          {
              $arrParam['andWhere'] = array(
                                        $jqGridDataHelper->getCondMapStr($request->getParameter(JqGridDataHelper::$KEY_SEARCH_OPER), "t1.".$request->getParameter(JqGridDataHelper::$KEY_SEARCH_FIELD), $request->getParameter(JqGridDataHelper::$KEY_SEARCH_STRING))
                                      );
          }

          if($request->hasParameter(JqGridDataHelper::$KEY_SIDX))
          {
              $arrParam['orderBy'] = "t1.".$request->getParameter(JqGridDataHelper::$KEY_SIDX)." ".$request->getParameter(JqGridDataHelper::$KEY_SORD);
          }

//          $resultSet = $this->mainModuleTable->getCustomList($arrParam, $request->getParameter(JqGridDataHelper::$KEY_PAGE), $request->getParameter(JqGridDataHelper::$KEY_ROWS), true);
          $resultSet = $this->mainModuleTable->getCustomList($arrParam, $request->getParameter(JqGridDataHelper::$KEY_PAGE), $request->getParameter(JqGridDataHelper::$KEY_ROWS), false);
      }
      else
      {
//          $resultSet = $this->mainModuleTable->getCommonList($request->getParameter(JqGridDataHelper::$KEY_PAGE), $request->getParameter(JqGridDataHelper::$KEY_ROWS), true);
          $resultSet = $this->mainModuleTable->getCommonList($request->getParameter(JqGridDataHelper::$KEY_PAGE), $request->getParameter(JqGridDataHelper::$KEY_ROWS), false);
      }

//      $filterResultSet = $resultSet;
      $filterResultSet = $this->filterList($resultSet);

      $pager     = $this->mainModuleTable->getPager();
      $filterResultSet = $jqGridDataHelper->convert($filterResultSet, $pager, JsCommonData::getSuccessDatum());

      return OutputHelper::getInstance()->outputJsonOrTextFormat($filterResultSet, $this);
  }

  /*
   * test func
   */
  public function executeTest(sfWebRequest $request)
  {
      $resultSet['request_params'] = $this->getRequest()->getParameterHolder()->getAll();
      $resultSet['info'] = $request->hasParameter(JqGridDataHelper::$KEY_OPER);

      return OutputHelper::getInstance()->outputJsonOrTextFormat($resultSet, $this);
  }

  /*
   *  do operation according to the oper parameter
   */
  public function executeDoOperation(sfWebRequest $request)
  {
      // forward to 404 if no oper
      $this->forward404Unless($request->hasParameter(JqGridDataHelper::$KEY_OPER));

      switch($request->getParameter(JqGridDataHelper::$KEY_OPER))
      {
          case JqGridDataHelper::$OPER_ADD:
              return $this->executeAdd($request);
              break;
          case JqGridDataHelper::$OPER_EDIT:
              return $this->executeEdit($request);
              break;
          case JqGridDataHelper::$OPER_DEL:
              return $this->executeDelete($request);
              break;
          default:
              $resultSet = JqGridDataHelper::getInstance()->getCommonDatum();
              $resultSet[JqGridDataHelper::$KEY_USER_DATA] = JsCommonData::getErrorDatum();
              return OutputHelper::getInstance()->outputJsonOrTextFormat($resultSet, $this);
              break;
      }
  }

  /*
   * @return 
   */
  public function inspectDataValidation(sfWebRequest $request, $params=array())
  {
      $result    = JsCommonData::getSuccessDatum();
      $reqParams = $request->getParameterHolder()->getAll();
      

      $id = ($reqParams['id']!=JqGridDataHelper::$KEY_EMPTY) ? $reqParams['id'] : 0;
      if($this->mainModuleTable->isExistedCode($reqParams['code'], $id))
      {
         $result = JsCommonData::getErrorDatum(WacErrorCode::getInfo(WacErrorCode::$duplicatedName, $reqParams['code']), WacErrorCode::$duplicatedName);
         return $result;
      }

      if($this->mainModuleTable->isExistedName($reqParams['name'], $id))
      {
         $result = JsCommonData::getErrorDatum(WacErrorCode::getInfo(WacErrorCode::$duplicatedName, $reqParams['name']), WacErrorCode::$duplicatedName);
         return $result;
      }
      return $result;
  }

  /*
   * @return validate
   */
  public function executeValidate(sfWebRequest $request)
  {
      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }

      $resultSet = JqGridDataHelper::getInstance()->getCommonDatum();
      $inspectResult = $this->inspectDataValidation($request);
      $resultSet[JqGridDataHelper::$KEY_USER_DATA] = $inspectResult;
      return OutputHelper::getInstance()->outputJsonOrTextFormat($resultSet, $this);
  }

  /*
   * @return list data array
   */
  public function executeAdd(sfWebRequest $request)
  {
      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }

      $inspectResult = $this->inspectDataValidation($request);
      if($inspectResult['status'] == WacOperationStatus::$Error)
      {
          $resultSet = JqGridDataHelper::getInstance()->getCommonDatum();
          $resultSet[JqGridDataHelper::$KEY_USER_DATA] = $inspectResult;
      }
      else
      {
          
          $exceptFields = array("id");
          $reqParams       = $this->getRequest()->getParameterHolder()->getAll();
          $targetItem   = $this->mainModuleTable->create();

          $resultSet = JqGridDataHelper::getInstance()->getCommonDatum();
          $resultSet[JqGridDataHelper::$KEY_USER_DATA] = JsCommonData::getSuccessDatum();

          if(count($reqParams)>0) {
              foreach($reqParams as $key => $value) {
                  if($this->mainModuleTable->hasColumn($key) and !in_array($key, $exceptFields)) {
                      $accessor = "set".ucfirst($key);
                      $targetItem->$accessor($value);
                  }
              }
              $targetItem->save();

              $this->afterAdd($request, $targetItem);
          }
      }

      return OutputHelper::getInstance()->outputJsonOrTextFormat($resultSet, $this);

  }

  /*
   * @return process result data array
   */
  public function executeEdit(sfWebRequest $request)
  {
      // forward to 404 if no id
      $this->forward404Unless($request->hasParameter('id'));

      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }

      $inspectResult = $this->inspectDataValidation($request);
      if($inspectResult['status'] == WacOperationStatus::$Error)
      {
          $resultSet = JqGridDataHelper::getInstance()->getCommonDatum();
          $resultSet[JqGridDataHelper::$KEY_USER_DATA] = $inspectResult;
      }
      else
      {
          
          $exceptFields = array("id");
          $reqParams = $this->getRequest()->getParameterHolder()->getAll();
          $targetItem = $this->mainModuleTable->findOneById($request->getParameter('id'));

          $resultSet = JqGridDataHelper::getInstance()->getCommonDatum();
          $resultSet[JqGridDataHelper::$KEY_USER_DATA] = JsCommonData::getSuccessDatum();

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
      return OutputHelper::getInstance()->outputJsonOrTextFormat($resultSet, $this);
  }

  /*
   * @return process result data array
   */
  public function executeDelete(sfWebRequest $request)
  {
      // forward to 404 if no id
      $this->forward404Unless($request->hasParameter('id'));

      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }

//      $resultSet = $this->getRequest()->getParameterHolder()->getAll();
      $resultSet = JqGridDataHelper::getInstance()->getCommonDatum();

      $ids = explode(',', $request->getParameter('id'));
      if(count($ids)>0)
      {
          foreach($ids as $id)
          {
              $targetItem = $this->mainModuleTable->findOneById($id);
              if($targetItem->delete()) {
                  $resultSet[JqGridDataHelper::$KEY_USER_DATA] = JsCommonData::getSuccessDatum();
              }
              else {
                  $resultSet[JqGridDataHelper::$KEY_USER_DATA] = JsCommonData::getErrorDatum(WacErrorCode::getInfo(WacErrorCode::$deleteError), WacErrorCode::$deleteError);
                  break;
              }
          }

      }

      $this->afterDelete($request);

      return OutputHelper::getInstance()->outputJsonOrTextFormat($resultSet, $this);
  }

  /*
   *  apply different dataFormater according to request params "data_format"
   *  return id=>name hash as select html format
   */
  public function executeGetIdNameHashInFormat(sfWebRequest $request)
  {
      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }

      $resultSet = array();

      $params = $this->getHashList("id", "name", 1, sfConfig::get("maxHashItems"));
      switch($request->getParameter("data_format"))
      {
          case StaticWacDataFormatType::$jsonFlexbox:
              $resultSet = JqFlexboxDataHelper::getInstance()->getCommonDatum($params);
              break;
          default:
              break;
      }

      return OutputHelper::getInstance()->outputJsonOrTextFormat($resultSet, $this);
  }

  /*
   *  apply different dataFormater according to request params "data_format"
   *  return id=>code hash as select html format
   */
  public function executeGetIdCodeHashInFormat(sfWebRequest $request)
  {
      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }
      
      $resultSet = array();

      $params = $this->getHashList("id", "code", 1, sfConfig::get("maxHashItems"));
      switch($request->getParameter("data_format"))
      {
          case StaticWacDataFormatType::$jsonFlexbox:
              $resultSet = JqFlexboxDataHelper::getInstance()->getCommonDatum($params);
              break;
          default:
              break;
      }

      return OutputHelper::getInstance()->outputJsonOrTextFormat($resultSet, $this);
  }

  /*
   *  return id=>name hash as select html format
   */
  public function executeGetIdNameHashHTML(sfWebRequest $request)
  {
      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }

      $resultSet = $this->getHashList("id", "name", 1, sfConfig::get("maxHashItems"));
      if($this->getRequest()->hasParameter("withNullItem"))
      {
          $params['withNullItem'] = true;
          return OutputHelper::getInstance()->outputHtmlSelectElements($resultSet, $this, $params);
      }
      else
      {
          return OutputHelper::getInstance()->outputHtmlSelectElements($resultSet, $this);
      }      
  }

  /*
   *  return code=>name hash as select html format
   */
  public function executeGetCodeNameHashHTML(sfWebRequest $request)
  {
      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }

      $resultSet = $this->getHashList("code", "name", 1, sfConfig::get("maxHashItems"));
      return OutputHelper::getInstance()->outputHtmlSelectElements($resultSet, $this);
  }

  /*
   *  return id=>code hash as select html format
   */
  public function executeGetIdCodeHashHTML(sfWebRequest $request)
  {
      if ($this->getRequest()->isXmlHttpRequest()) {
          sfConfig::set('sf_web_debug', false);
      }

      $resultSet = $this->getHashList("id", "code", 1, sfConfig::get("maxHashItems"));
      return OutputHelper::getInstance()->outputHtmlSelectElements($resultSet, $this);
  }

  /*
   * @return hash list data array
   * @keyField - key field
   * @valField - value field
   * @page     - at pager
   * @rows=20  - rows per pager
   *    *
   */
  protected function getHashList($keyField, $valField, $page=1, $rows=20)
  {
      $resultSet = array();
      $arrParam = array();

      if($this->getRequest()->hasParameter("status"))
      {
          $arrParam['andWhere'][] = "status=".StaticWacFormStatus::getId($this->getRequest()->getParameter("status"));
      }

      $arrParam['orderBy'] = "t1.id asc";
      
      $listItems = $this->mainModuleTable->getCustomList($arrParam, $page, $rows, true);

      if(count($listItems)>0)
      {
          foreach($listItems as $listItem)
          {
              $tmpArr = array();
//              $keyMethodName = "get".ucfirst($keyField);
//              $valueMethodName = "get".ucfirst($valField);
//              $tmpArr[$arrListItem->$keyMethodName()] = $arrListItem->$valueMethodName();
              $tmpArr = array("key"=>$listItem[$keyField], "value"=>$listItem[$valField]);
              $resultSet[] = $tmpArr;
          }
      }

      return $resultSet;
  }

   /*
   * this method can be override
   */
  public function afterAdd(sfWebRequest $request, $targetObj=null)
  {
      // log the operation
      $logParams = array("type"=>WacLogger::$logTypeUser,
              "userId"=>$this->getUser()->getGuardUser()->getId(),
              "userName"=>$this->getUser()->getGuardUser()->getUsername(),
              "target"=> WacModule::getCaption($this->moduleName),
              "targetId"=>$targetObj->getId());
      $this->wacLogger->logOperation(WacOperationType::$add, $logParams);
  }

   /*
   * this method can be override
   */
  public function afterEdit(sfWebRequest $request, $targetObj=null)
  {
      // log the operation
      $logParams = array("type"=>WacLogger::$logTypeUser,
              "userId"=>$this->getUser()->getGuardUser()->getId(),
              "userName"=>$this->getUser()->getGuardUser()->getUsername(),
              "target"=> WacModule::getCaption($this->moduleName),
              "targetId"=>$request->getParameter('id'));
      $this->wacLogger->logOperation(WacOperationType::$edit, $logParams);
  }

   /*
   * this method can be override
   */
  public function afterDelete(sfWebRequest $request, $targetObj=null)
  {
      // log the operation
        $logParams = array("type"=>WacLogger::$logTypeUser,
                "userId"=>$this->getUser()->getGuardUser()->getId(),
                "userName"=>$this->getUser()->getGuardUser()->getUsername(),
                "target"=> WacModule::getCaption($this->moduleName),
                "targetId"=>$request->getParameter('id'));
        $this->wacLogger->logOperation(WacOperationType::$del, $logParams);
  }

  /*
   * this method can be override
   */
  public function afterAudit(sfWebRequest $request, $targetObj=null)
  {
      // log the operation
      $logParams = array("type"=>WacLogger::$logTypeUser,
              "userId"=>$this->getUser()->getGuardUser()->getId(),
              "userName"=>$this->getUser()->getGuardUser()->getUsername(),
              "target"=> WacModule::getCaption($this->moduleName),
              "targetId"=>$targetObj->getId());
      $this->wacLogger->logOperation(WacOperationType::$audit, $logParams);
  }


}
