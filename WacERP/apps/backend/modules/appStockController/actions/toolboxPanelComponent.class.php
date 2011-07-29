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

        $btnOptions = new StdClass;
        $btnOptions->invokeModuleName     = "wacToolbox";
        $btnOptions->invokeComponentName  = "options";
        $btnOptions->icon             = "Gear-icon.png";
        $btnOptions->label            = $this->i18n->__("Options");
        $btnOptions->clickEvent       = $this->innerContextInfo["moduleName"].sfConfig::get("app_wac_events_toolbox_click");
        $btnOptions->clickEventParams = array();
        $this->toolboxBtns->attach($btnOptions);

        $btnCalculator = new StdClass;
        $btnCalculator->invokeModuleName     = "wacToolbox";
        $btnCalculator->invokeComponentName  = "calculator";
        $btnCalculator->icon             = "Gear-icon.png";
        $btnCalculator->label            = $this->i18n->__("Calculator");
        $btnCalculator->clickEvent       = $this->innerContextInfo["moduleName"].sfConfig::get("app_wac_events_toolbox_click");
        $btnCalculator->clickEventParams = array();
        $this->toolboxBtns->attach($btnCalculator);

        $btnCalendar = new StdClass;
        $btnCalendar->invokeModuleName     = "wacToolbox";
        $btnCalendar->invokeComponentName  = "calendar";
        $btnCalendar->icon             = "Gear-icon.png";
        $btnCalendar->label            = $this->i18n->__("Calendar");
        $btnCalendar->clickEvent       = $this->innerContextInfo["moduleName"].sfConfig::get("app_wac_events_toolbox_click");
        $btnCalendar->clickEventParams = array();
        $this->toolboxBtns->attach($btnCalendar);



    }



}