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


}
