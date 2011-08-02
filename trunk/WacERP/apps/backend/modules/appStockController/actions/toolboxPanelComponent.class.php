<?php
/**
 * manage the form
 */
class toolboxPanelComponent extends WacComponent
{
//    public function initialize($context, $moduleName, $actionName) {
//        parent::initialize($context, $moduleName, $actionName);
//        $this->_setupEnabledBox();
//    }
    public function execute($request)
    {
        parent::execute($request);

        $this->_setupEnabledBox();
    }

    protected function _setupEnabledBox(){
        $this->toolboxBtns = new SplObjectStorage();

        $toolboxBtn = new StdClass;
        $toolboxBtn->srcModuleName       = $this->innerContextInfo["moduleName"];
        $toolboxBtn->invokeModuleName    = "wacToolbox";
        $toolboxBtn->invokeComponentName = "options";
        $toolboxBtn->icon                = "Gear-icon.png";
        $toolboxBtn->label               = $this->i18n->__("Options");
        $toolboxBtn->triggerEvent        = "{$toolboxBtn->invokeComponentName}_{$toolboxBtn->srcModuleName}".sfConfig::get("app_wac_events_toolbox_click");
        $toolboxBtn->triggerEventParams  = array();
        $this->toolboxBtns->attach($toolboxBtn);

        $toolboxBtn = new StdClass;
        $toolboxBtn->srcModuleName       = $this->innerContextInfo["moduleName"];
        $toolboxBtn->invokeModuleName    = "wacToolbox";
        $toolboxBtn->invokeComponentName = "calculator";
        $toolboxBtn->icon                = "Gear-icon.png";
        $toolboxBtn->label               = $this->i18n->__("Calculator");
        $toolboxBtn->triggerEvent        = "{$toolboxBtn->invokeComponentName}_{$toolboxBtn->srcModuleName}".sfConfig::get("app_wac_events_toolbox_click");
        $toolboxBtn->triggerEventParams  = array();
        $this->toolboxBtns->attach($toolboxBtn);

        $toolboxBtn = new StdClass;
        $toolboxBtn->srcModuleName       = $this->innerContextInfo["moduleName"];
        $toolboxBtn->invokeModuleName    = "wacToolbox";
        $toolboxBtn->invokeComponentName = "calendar";
        $toolboxBtn->icon                = "Gear-icon.png";
        $toolboxBtn->label               = $this->i18n->__("Calendar");
        $toolboxBtn->triggerEvent        = "{$toolboxBtn->invokeComponentName}_{$toolboxBtn->srcModuleName}".sfConfig::get("app_wac_events_toolbox_click");
        $toolboxBtn->triggerEventParams  = array();
        $this->toolboxBtns->attach($toolboxBtn);


    }



}