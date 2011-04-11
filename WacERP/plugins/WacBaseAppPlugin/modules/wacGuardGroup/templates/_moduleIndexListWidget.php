<?php

/*
 *  use for creating inline list widget
 *  here defines widgets logic of the module
 */

  echo WacWidgetHelper::getInstance()->getWidget(
        WacModule::getInstance()->getName("wacCommon"), // be invoked module name
        WacComponentList::$moduleIndexListWidget, // be invoked widget name
        array(
            'invokeParams' => array(
                    'contextInfo' => $contextInfo
            ),
            'enableWidgets' => array(// enable sub widgets
                WacComponentList::$tableToolbar,
                WacComponentList::$moduleList,
                WacComponentList::$moduleForm
            )
        )
);
?>