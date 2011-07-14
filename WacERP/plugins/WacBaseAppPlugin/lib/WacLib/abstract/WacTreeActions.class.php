<?php

/**
 * WacTreeActions actions.
 *
 * Descriptions: provides common methods for wac tree action
 *
 * @package    Wac
 * @subpackage lib
 * @author     ben
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
abstract class WacTreeActions extends WacModuleAction {

    /*
     * _getChildren
     * @return array $filterResultSet
     */

    protected function _getChildren(sfWebRequest $request) {
        $this->forward404Unless($request->hasParameter('id'));

        $jsTreeDataHelper = JsTreeDataHelper::getInstance();
        $resultSet = array();
        $theNode = $this->mainModuleTable->findOneById($request->getParameter("id"));


        if (!$theNode) {
            $count = $this->mainModuleTable->count();
            if ($request->getParameter("id") == 1 && $count === 0) {
                $jsTreeDataHelper->initRoot($this->mainModuleTable);  // missing a root note, initialize it
            } else {
                throw new sfException("Wac Error: require valid parent id in the tree!");
            }
        }

        $resultSet = $jsTreeDataHelper->getChildren($theNode, $this->mainModuleTable, false, -1);
//        return $resultSet;

        $filterResultSet = $this->filterList($resultSet);
        $pager = $this->mainModuleTable->getPager();

        $filterResultSet = $jsTreeDataHelper->convert($filterResultSet, $pager, JsCommonData::getSuccessDatum());
        return $filterResultSet;
    }

    /*
     * _getCreateNode
     * $properties - node's create properties
     * @return result array
     */

    protected function _createNode(sfWebRequest $request, $params=array()) {
        $this->forward404Unless($request->hasParameter('id'));

        $inspectResult = $this->inspectDataValidation($request, array("opType"=>WacOperationType::$add));
        $resultSet = JsCommonData::getInstance()->getCommonDatum();

        if($inspectResult['status'] == WacOperationStatus::$Error) {
            $resultSet[JsCommonData::$KEY_INFO] = $inspectResult; // for compatibility JqGrid tips
        }
        else{
            $jsTreeDataHelper = JsTreeDataHelper::getInstance();
            $parent = $this->mainModuleTable->findOneById($request->getParameter("id"));

            if ($parent) {
                $_params = $this->_mapData($request, $params);
                $newNode = $jsTreeDataHelper->createNode($parent, $this->mainModuleTable, $_params);

                $succInfo = JsCommonData::getSuccessDatum(
                   Doctrine::getTable(WacTable::$wacSysmsg)->getContentByCode("sys_add_succ")
                );
                $resultSet[JsCommonData::$KEY_INFO] = $succInfo;
                $resultSet["id"] = $newNode->getId();
            } else {
                throw new sfException("Wac Error: require valid parent id in the tree!");
            }
        }

        return $resultSet;
    }

    /*
     * _editNode
     * @return result array
     */

    protected function _editNode(sfWebRequest $request) {
        $this->forward404Unless($request->hasParameter('id'));

        $jsTreeDataHelper = JsTreeDataHelper::getInstance();
        $node = $this->mainModuleTable->findOneById($request->getParameter("id"));

        if ($node) {
            $_params = $this->_mapData($request);
            $jsTreeDataHelper->editNode($node, $this->mainModuleTable, $_params);
            return $jsTreeDataHelper->getSuccDatum($node->getId());
        } else {
            throw new sfException("Wac Error: require valid node id in the tree!");
        }

        return $jsTreeDataHelper->getErrDatum();
    }

    /*
     * _moveNode
     * @return result array
     */

    protected function _moveNode(sfWebRequest $request) {
        $this->forward404Unless($request->hasParameter('id'));
        $this->forward404Unless($request->hasParameter('target_parent_id'));

        $resultSet = JsCommonData::getInstance()->getCommonDatum();

        $jsTreeDataHelper = JsTreeDataHelper::getInstance();
        $node = $this->mainModuleTable->findOneById($request->getParameter("id"));
        $targetParentNode = $this->mainModuleTable->findOneById($request->getParameter("target_parent_id"));

        if ($node) {
            $_params = $request->getParameterHolder()->getAll();
            $jsTreeDataHelper->moveNode($node, $targetParentNode, $this->mainModuleTable, $_params);
            
//            return $jsTreeDataHelper->getSuccDatum($node->getId());
            $resultSet[JsCommonData::$KEY_INFO] = JsCommonData::getSuccessDatum();
            $resultSet["id"] = $node->getId();
        } else {
            $resultSet[JsCommonData::$KEY_INFO] = JsCommonData::getErrorDatum(
               "Wac Error: require valid node id in the tree!"
            );
//            throw new sfException("Wac Error: require valid node id in the tree!");
        }

        return $resultSet;
//        return $jsTreeDataHelper->getErrDatum();
    }

    /*
     * _removeNode
     * @return result array
     */

    protected function _removeNode(sfWebRequest $request) {
        $this->forward404Unless($request->hasParameter('id'));

        $jsTreeDataHelper = JsTreeDataHelper::getInstance();
        $node = $this->mainModuleTable->findOneById($request->getParameter("id"));

        $this->doBeforeNodeRemove($request);
        $succFlag = $jsTreeDataHelper->removeNode($node, $this->mainModuleTable);
        
//        return $succFlag ? $jsTreeDataHelper->getSuccDatum() : $jsTreeDataHelper->getErrDatum();
        return $succFlag ? JsCommonData::getSuccessDatum() : JsCommonData::getErrorDatum();
    }

    /*
     * canbe override by children class
     */
    public function doBeforeNodeRemove(sfWebRequest $request) {}

    /*
     * _copyNode
     * @return result array
     */

    protected function _copyNode(sfWebRequest $request) {
        $this->forward404Unless($request->hasParameter('id'));
        $this->forward404Unless($request->hasParameter('target_parent_id'));

        $jsTreeDataHelper = JsTreeDataHelper::getInstance();
        $node = $this->mainModuleTable->findOneById($request->getParameter("id"));
        $targetParentNode = $this->mainModuleTable->findOneById($request->getParameter("target_parent_id"));

        if ($node) {
            $_params = $request->getParameterHolder()->getAll();
            $jsTreeDataHelper->copyNode($node, $targetParentNode, $this->mainModuleTable, $_params);
            return $jsTreeDataHelper->getSuccDatum($node->getId());
        } else {
            throw new sfException("Wac Error: require valid node id in the tree!");
        }

        return $jsTreeDataHelper->getErrDatum();
    }

    /*
     * _mapData
     *
     * canbe override by children method, to know which data should be update/insert, apply for different module/tables
     */

    protected function _mapData(sfWebRequest $request, $params=array()) {
        $reqParams = $request->getParameterHolder()->getAll();
        $_params = array_merge(array(), $params);
        $_params["user_id"] = $this->getUser()->getGuardUser()->getId();
        if(isset($reqParams["position"])) {
            $_params["position"] = $reqParams["position"];
        }
        
        if(isset($reqParams["type"])) {
            $_params["type"] = $reqParams["type"];
        }
        
        if(isset($reqParams["caption"])){
            $_params["caption"]  = $reqParams["caption"];
        }
        
//        $this->getLogger()->log(print_r($_params, true));
        return $_params;
    }

    /*
     * @return children array
     */

    public function executeGetChildren(sfWebRequest $request) {
        return OutputHelper::getInstance()->output($this->_getChildren($request), $this);
    }

    /*
     * @return result array
     */

    public function executeCreateNode(sfWebRequest $request) {
        return OutputHelper::getInstance()->output($this->_createNode($request), $this);
    }

    /*
     * @return result array
     */

    public function executeRemoveNode(sfWebRequest $request) {
        return OutputHelper::getInstance()->output($this->_removeNode($request), $this);
    }

    /*
     * @return list data array
     */

    public function executeEditNode(sfWebRequest $request) {
        return OutputHelper::getInstance()->output($this->_editNode($request), $this);
    }

    /*
     * @return list data array
     */

    public function executeMoveNode(sfWebRequest $request) {
        if($request->hasParameter("copy") && $request->getParameter("copy")=="1"){
            return OutputHelper::getInstance()->output($this->_copyNode($request), $this);
        }
        else{
            return OutputHelper::getInstance()->output($this->_moveNode($request), $this);
        }
    }

}