<?php
/*
 *  here defines widgets logic of the module
 */

  echo WacWidgetHelper::getInstance()->getWidget(
        WacModule::getInstance()->getName("wacCategory"), // be invoked module name
        WacComponentList::$categoryManagerWidget, // be invoked widget name
        array(
            'method'        => WacWidgetHelper::$methodComponent,
            'enableWidgets' => array(// enable sub widgets
                WacComponentList::$moduleTree
            )
        )
   );

?>