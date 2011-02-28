<?php

/*
 *  here defines widgets logic of the module
 */
echo WacWidgetHelper::getInstance()->getWidget(
        WacModule::getName("wacCommon"), // be invoked module name
        WacComponentList::$moduleIndexListWidget, // be invoked widget name
        array(
            'contextInfo' => $contextInfo, // current module context info
            'enableWidgets' => array(// enable sub widgets
                WacComponentList::$moduleToolBar,
                WacComponentList::$moduleList
            )
        )
);
?>