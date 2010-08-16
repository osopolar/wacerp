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
    // define a info holder
    public function execute($request) {
        $this->contextInfo = array();
        $this->contextInfo["componentName"] = $this->getActionName();
        $this->contextInfo["moduleName"] = $this->getModuleName();
    }

    public function getComponentName() {
        return $this->getActionName();
    }

    public function getComponentJs() {
        return 'apps'.'/'.$this->getContext()->getConfiguration()->getApplication().'/'.$this->getModuleName().'/'.$this->getActionName();
    }

    /*
   *  return internal path of the request
    */
    public function getInternalPath() {
        return $this->getContext()->getConfiguration()->getApplication()."/".$this->getModuleName()."/".$this->getActionName();
    }

}