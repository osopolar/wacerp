<?php

/*
 *  here defines widgets logic of the module
 */

echo WacWidgetHelper::getInstance()->getWidget(
        WacModule::getInstance()->getName("wacFileManager"), // be invoked module name
        WacComponentList::$fileUploadWidget, // be invoked widget name
        array(
            'contextInfo' => $contextInfo, // current module context info
            'enableWidgets' => array(// enable sub widgets
                WacComponentList::$moduleUploadForm
            )
        )
);
?>