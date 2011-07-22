<?php

/**
 * wacFileManager actions.
 *
 * @package    Wac
 * @subpackage wacFileManager
 * @author     JianBinBi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacFileManagerActions extends WacTreeActions {

    public function preExecute() {
        parent::preExecute();
        $this->mainModuleTable->setCustomFilter(array("user_id" => $this->getUser()->getGuardUser()->getId()));
    }
    
    /*
     * @return jsonrpc msg
     */

    public function executeUpload(sfWebRequest $request) {
        $jsonRpcUploadHelper = JsonRpcUploadHelper::getInstance();
        $jsonRpcData = JsonRpcData::getInstance();

//        $resultSet = $jsonRpcData->getErrMsg("101");

        $resultSet = $jsonRpcData->getSuccMsg();
        try{
            // register a listener when upload finish
            sfContext::getInstance()->getEventDispatcher()->connect(sfConfig::get("app_wac_events_file_upload_finish"), array($this, "doAfterUpload"));
            
            $jsonRpcUploadHelper->process($request);
        }
        catch(WacAppException $e){
            $resultSet = $jsonRpcData->getErrMsg($e->getCode());
        }
        catch(sfException $e){
            throw new sfException("Wac Error: sth wrong when upload '!");
        }
        
        return OutputHelper::getInstance()->output($resultSet, $this);
    }

    /*
     * be trigger by event app_wac_events_file_upload_finish, 
     * $e->getParameters() return an array looks like:
     * Array
        (
            [config] => Array
        (
            [wacUploadDir] => D:\WebAppChina\WacERP\trunk\WacERP\web\uploads/wac_uploads/
            [targetDir] => D:\WebAppChina\WacERP\trunk\WacERP\web\uploads/wac_uploads/d/4/
            [cachingPolicy] => 1
            [cleanupTargetDir] =>
            [cachingPath] => d/4/
            [maxFileAge] => 3600
        )

        [fileInfo] => Array
            (
                [name] => aports.zip
                [type] => application/zip
                [tmp_name] => D:\xampp\tmp\php360.tmp
                [error] => 0
                [size] => 118066
            )

        [actualFileName] => p15rjd4gik19cd16a01mfc1n6e1j426.zip
        )
     *
     */
    public function doAfterUpload(sfEvent $e){
//        $this->getLogger()->log("doAfterUpload: " . print_r($e->getParameters(), true));
        $this->_createNode($this->getRequest(), $e->getParameters());
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

//        if($this->mainModuleTable->isExistedAttribute("caption", $reqParams['caption'], $id)){
//            $result = JsCommonData::getErrorDatum($this->getSysMsg("sys_err_duplicated_name", array($reqParams['caption'])), WacErrorCode::$duplicatedName);
//            return $result;
//        }

        return $result;
    }

    protected function _mapData(sfWebRequest $request, $params=array()){
        $_params = array();
        if($request->hasParameter("type") && $request->getParameter("type")==JsTreeDataHelper::$typeLeaf){
            $_params = array(
                "name" => $params["actualFileName"],
                "path" => $params["config"]["cachingPath"],
                "caption"   => $params["fileInfo"]["name"],
                "file_type" => $params["fileInfo"]["type"],
                "size"      => $params["fileInfo"]["size"]
            );
        }

        
        return parent::_mapData($request, $_params);
    }


}
