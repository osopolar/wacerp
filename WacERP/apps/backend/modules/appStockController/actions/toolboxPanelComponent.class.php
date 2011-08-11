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
        $toolboxBtn->invokeModuleName    = "appStockController";
        $toolboxBtn->invokeComponentName = "";
        $toolboxBtn->invokeAction        = "getManagementPanel";
        $toolboxBtn->iconCss             = "wac-bi-options";
        $toolboxBtn->label               = $this->i18n->__("Options");
        $toolboxBtn->triggerEvent        = sfConfig::get("app_wac_events_show_options_panel");  // listened by the desktop
        $toolboxBtn->loadComponent       = false;
        $toolboxBtn->enable              = true;
        $this->toolboxBtns->attach($toolboxBtn);

        $toolboxBtn = new StdClass;
        $toolboxBtn->srcModuleName       = $this->innerContextInfo["moduleName"];
        $toolboxBtn->invokeModuleName    = "wacToolbox";
        $toolboxBtn->invokeComponentName = "calculator";
        $toolboxBtn->invokeAction        = "";
        $toolboxBtn->iconCss             = "wac-bi-calculator";
        $toolboxBtn->label               = $this->i18n->__("Calculator");
        $toolboxBtn->triggerEvent        = "{$toolboxBtn->invokeComponentName}_{$toolboxBtn->srcModuleName}".sfConfig::get("app_wac_events_toolbox_click"); // listened by the corresponding component
        $toolboxBtn->loadComponent       = true;
        $toolboxBtn->enable              = true;
        $this->toolboxBtns->attach($toolboxBtn);

        $toolboxBtn = new StdClass;
        $toolboxBtn->srcModuleName       = $this->innerContextInfo["moduleName"];
        $toolboxBtn->invokeModuleName    = "wacToolbox";
        $toolboxBtn->invokeComponentName = "calendar";
        $toolboxBtn->invokeAction        = "";
        $toolboxBtn->iconCss             = "wac-bi-calendar";
        $toolboxBtn->label               = $this->i18n->__("Calendar");
        $toolboxBtn->triggerEvent        = "{$toolboxBtn->invokeComponentName}_{$toolboxBtn->srcModuleName}".sfConfig::get("app_wac_events_toolbox_click"); // listened by the corresponding component
        $toolboxBtn->loadComponent       = true;
        $toolboxBtn->enable              = true;
        $this->toolboxBtns->attach($toolboxBtn);

        $toolboxBtn = new StdClass;
        $toolboxBtn->srcModuleName       = $this->innerContextInfo["moduleName"];
        $toolboxBtn->invokeModuleName    = "wacToolbox";
        $toolboxBtn->invokeComponentName = "googleMap";
        $toolboxBtn->invokeAction        = "";
        $toolboxBtn->iconCss             = "wac-bi-map";
        $toolboxBtn->label               = $this->i18n->__("Google").$this->i18n->__("Map");
        $toolboxBtn->triggerEvent        = "{$toolboxBtn->invokeComponentName}_{$toolboxBtn->srcModuleName}".sfConfig::get("app_wac_events_toolbox_click"); // listened by the corresponding component
        $toolboxBtn->loadComponent       = true;
        $toolboxBtn->enable              = true;
        $this->toolboxBtns->attach($toolboxBtn);


    }



}