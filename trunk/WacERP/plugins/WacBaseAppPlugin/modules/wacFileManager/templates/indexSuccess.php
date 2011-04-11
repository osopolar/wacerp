<?php
/*
 *  here defines widgets logic of the module
 */

//  echo WacWidgetHelper::getInstance()->getWidget(
//        WacModule::getInstance()->getName("wacFileManager"), // be invoked module name
//        WacComponentList::$fileManagerWidget, // be invoked widget name
//        array(
//            'contextInfo' => $contextInfo, // current module context info
//            'enableWidgets' => array(// enable sub widgets
////                WacComponentList::$moduleToolBar,
//                WacComponentList::$moduleTree,
//                WacComponentList::$moduleUploadForm
//            )
//        )
//);

include_component(
        $contextInfo["moduleName"],
        WacComponentList::$fileManagerWidget,
        array(
            'method'        => WacWidgetHelper::$methodComponent,
            'enableWidgets' => array(// enable sub widgets
                WacComponentList::$moduleTree,
                WacComponentList::$moduleUploadForm
            )
        ));
?>