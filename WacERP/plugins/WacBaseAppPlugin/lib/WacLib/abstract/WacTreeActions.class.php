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
abstract class WacTreeActions extends WacCommonActions {
    /*
     * it act as a data provider, can be invoked by executeGetList and executeDataExport
     *
     * @return $filterResultSet
     */

    protected function getChildren(sfWebRequest $request) {
        $this->forward404Unless($request->hasParameter('id'));
        
        $jsTreeDataHelper = JsTreeDataHelper::getInstance();
        $theNode = Doctrine::getTable($this->mainModuleTable)->findOneById($request->getParameter("id"));

        if($theNode){

        }
        else{  //
            $count = Doctrine::getTable($this->mainModuleTable)->count();
            if($request->getParameter("id")==1 && $count === 0){
                $jsTreeDataHelper->initRoot($this->mainModuleTable);  // missing a root note, initialize it
            }
            else{
                throw new sfException("Wac Error: require valid parent id in the tree!");
            }

        }


        $filterResultSet = $jsTreeDataHelper->convert($filterResultSet, $pager, JsCommonData::getSuccessDatum(), $listMetaInfo);
        return $filterResultSet;
    }

    /*
     * @return list data array
     */

    public function executeGetChildren(sfWebRequest $request) {

        return OutputHelper::getInstance()->output($this->getChildren($request), $this);
    }

}