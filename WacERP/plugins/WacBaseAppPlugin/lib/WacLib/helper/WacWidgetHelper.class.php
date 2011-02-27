<?php
/**
 * Description of WacWidgetHelper
 * build up the widgets
 *
 * @author ben
 *
 */
class WacWidgetHelper
{
    protected static $_instance;

    public static function getInstance()
    {
        $class = __CLASS__;
        if(is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __construct()			// construct method
    {
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
     *  'contextInfo' => $contextInfo,  // module context info
     *  'ownsWidgets' => array()
     */
    public function getWidget($moduleName, $widgetName, $contextInfo, $enableWidgets, $params=array())
   {
        return get_partial(
                "{$moduleName}/{$widgetName}",
                array(
                    'contextInfo'   => $contextInfo,
                    'enableWidgets' => $enableWidgets
                ));
    }

}
