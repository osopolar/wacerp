<?php

/*
 *  here defines widgets logic of the module
 */
//echo WacWidgetHelper::getInstance()->getWidget(
//       $contextInfo["moduleName"], // be invoked module name
//       WacComponentList::$inlineTableWidget, // be invoked widget name
//        array(
//            'method'        => WacWidgetHelper::$methodComponent
//        )
//   );
include_component($contextInfo["moduleName"], WacComponentList::$inlineTableWidget);
?>