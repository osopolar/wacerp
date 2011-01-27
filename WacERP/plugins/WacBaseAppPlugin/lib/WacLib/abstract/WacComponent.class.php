<?php

/**
 * WacCommonActions actions.
 *
 * @package    WacStorehouse
 * @subpackage lib
 * @author     ben
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */

abstract class WacComponent extends sfComponent {
    protected $innerContextInfo = array();
    
    // define a info holder
    public function execute($request) {
        $this->innerContextInfo = array();
        $this->innerContextInfo["componentName"]  = $this->getActionName();
        $this->innerContextInfo["moduleName"]     = $this->getModuleName();
        $this->innerContextInfo["componentJs"]    = $this->getComponentJs();
        $this->innerContextInfo["wacComponentJs"] = $this->getWacComponentJs();
        $this->innerContextInfo["listCols"]       = $this->setupJqGridCols();

        $this->contextInfo = $this->innerContextInfo;  //assign to tpl
    }

    public function executeMain($request)
    {
        $this->execute($request);
//        $this->getResponse()->addJavaScript($this->getWacComponentJs(), 'last');  // layout
    }

    public function executeLayout($request)
    {
        $this->execute($request);
        $this->getResponse()->addJavaScript($this->getWacComponentJs(), '');  // layout
    }

    // canbe override by child method
    public function setupJqGridCols(){
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
    

    public function getComponentName() {
        return $this->getActionName();
    }

    public function getComponentJs($specName="") {
        return
        ($specName=="") ?
        'apps'.'/'.$this->getContext()->getConfiguration()->getApplication().'/'.$this->getModuleName().'/_'.$this->getActionName()
                :
        'apps'.'/'.$this->getContext()->getConfiguration()->getApplication().'/'.$this->getModuleName().'/_'.$specName;
    }

    public function getWacComponentJs($specName="") {
        return
        ($specName=="") ?
        '/WacBaseAppPlugin/js/modules/'.$this->getModuleName().'/_'.$this->innerContextInfo["componentName"]
                :
        '/WacBaseAppPlugin/js/modules/'.$this->getModuleName().'/_'.$specName;
    }

    public function addWacComponentJs() {
//        component js required, begin
        $this->getResponse()->addJavaScript($this->getWacComponentJs(), '');
//        component js required, begin
    }

    /*
   *  return internal path of the request
    */
    public function getInternalPath() {
        return $this->getContext()->getConfiguration()->getApplication()."/".$this->getModuleName()."/".$this->getActionName();
    }

}