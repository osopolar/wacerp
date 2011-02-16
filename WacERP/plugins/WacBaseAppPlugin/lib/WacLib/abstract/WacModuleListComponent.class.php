<?php

/**
 * WacCommonActions actions.
 *
 * @package    WacStorehouse
 * @subpackage lib
 * @author     ben
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */

abstract class WacModuleListComponent extends WacComponent {
    public function execute($request) {
        parent::execute($request);
        $this->addModuleListInfo();
    }

    public function addModuleListInfo()
    {
        if(isset($this->contextInfo)){
            $this->contextInfo["listCols"] = $this->setupJqGridCols();
            $this->contextInfo["operatorBtns"] = $this->setupOperatorBtns();
            $this->contextInfo["toolbarSearchField"] = $this->setupToolbarSearchField();
        }
    }

    // canbe override by child method
    /*
     * when key search is actived on the toolbar, which fieldname should be found, default is "name"
     */
    public function setupToolbarSearchField(){
        return "name";
    }

    // canbe override by child method
    public function setupJqGridCols(){
        return array();
    }

    // canbe override by child method
    /*
     * setup operation btns on the list
     */
    public function setupOperatorBtns(){
        // pls refer to WacModuleHelper::$ctlBtns
        return array();
    }

    public function getListMetaInfo(){
        $metaInfo = JsCommonData::getListMetaDatum();
        if(!isset($this->innerContextInfo["listCols"])){
            $this->innerContextInfo["listCols"] = $this->setupJqGridCols();
        }

        if(count($this->innerContextInfo["listCols"])>0){
            foreach($this->innerContextInfo["listCols"] as $listCol){
                $metaInfo["displayCols"][] = array("name"=>$listCol["name"], "label"=>$listCol["label"]);
            }
        }
        
        return $metaInfo;
    }

}