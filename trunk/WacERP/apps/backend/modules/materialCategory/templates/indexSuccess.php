<?php
/*
 *  here defines widgets logic of the module
 */

  echo WacWidgetHelper::getInstance()->getWidget(
        $contextInfo["moduleName"], // be invoked module name
        WacComponentList::$categoryManagerWidget, // be invoked widget name
        array(
            'method'        => WacWidgetHelper::$methodComponent,
            'enableWidgets' => array(// enable sub widgets
                WacComponentList::$moduleTree,
                WacComponentList::$moduleTreeEntityDialog
            )
        )
   );

?>