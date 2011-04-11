<?php

/*
 *  use for creating inline list widget
 *  here defines widgets logic of the module
 */

//OutputHelper::getInstance()->writeNote("{$widgetName}, begin");
echo WacWidgetHelper::getInstance()->getWidget(
        WacModule::getInstance()->getName("wacCommon"),             // be invoked module name
        WacComponentList::$inlineTableWidget,    // be invoked widget name
        array(
            'invokeParams' => array(
                    'contextInfo' => $contextInfo
            ),                           // current module context info
            'enableWidgets' => array(                                       // enable sub widgets
                          WacComponentList::$tableToolbar,
                          WacComponentList::$baseInlineTableA
            )
        )
);
//OutputHelper::getInstance()->writeNote("{$widgetName}, end");
?>