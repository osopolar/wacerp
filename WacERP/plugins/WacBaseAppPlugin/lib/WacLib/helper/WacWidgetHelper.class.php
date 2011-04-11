<?php

/**
 * Description of WacWidgetHelper
 * build up the widgets
 *
 * @author ben
 *
 */
class WacWidgetHelper {

    protected static $_instance;

    public static $methodPartial   = "partial";
    public static $methodComponent = "component";

    public static function getInstance() {
        $class = __CLASS__;
        if (is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __construct() {   // construct method
        ;
    }

    public function getPartial($templateName, $vars = null) {
        $this->getContext()->getConfiguration()->loadHelpers('Partial');

        $vars = null !== $vars ? $vars : $this->varHolder->getAll();

        return get_partial($templateName, $vars);
    }

    /*
     * getWidget
     * return string
     * @moduleName - module name
     * @widgetName - widget name
     * @params = array(
      'method' => component / partial
      'contextInfo'   => $contextInfo,
      'enableWidgets' => array(                                       // enable sub widgets
      WacComponentList::$moduleToolBar,
      WacComponentList::$moduleList
      )
      )
     */

    public function getWidget($moduleName, $widgetName, $params=array()) {
        if(isset($params["method"]) && $params["method"] == WacWidgetHelper::$methodComponent){
            return get_component($moduleName, $widgetName, $params);
        }
        else{
            return get_partial(
                    "{$moduleName}/{$widgetName}",
                    $params
            );
        }
    }

    public function getUiid($contextInfo=array())
    {
        $request = sfContext::getInstance()->getRequest();
        if($request->hasParameter("uiid")){
            return $request->getParameter("uiid");
        }

        return uniqid();
    }

    public function getWidgetName($filename, $module, $attachInfo=array())
    {
        $widgetName = substr(basename($filename, ".php"), 1);
        return $widgetName."_".$module.$attachInfo["uiid"];
    }

    /*
     * to judge if embedWidge should be include or not
     * @$embedWidget - current widget
     * @enableWidgets - mix, array widget names  or string "all"
     */
    public static function enableWidget($embedWidget, $enableWidgets){
        if(is_array($enableWidgets)){
            return in_array($embedWidget, $enableWidgets);
        }
        else{
            return ($enableWidgets == WacComponentList::$all);
        }
    }

    /*
     * smartly get module name
     *
     * @ $moduleContextInfo - module context info
     * @ return - if moudle component existed then return it , otherwise return common's
     */
    public static function getModuleName($moduleContextInfo, $componentName){
        $sfController = sfContext::getInstance()->getController();
        if($sfController->componentExists($moduleContextInfo["moduleName"], $componentName)){
            return $moduleContextInfo["moduleName"];
        }
        else{
            return WacModule::getInstance()->getName("wacCommon");
        }
    }

}
