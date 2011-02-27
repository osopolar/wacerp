<?php

/*
 *  here defines widgets logic of the module
 */

//include_partial(WacModule::getName("wacCommon") . "/" . WacComponentList::$moduleIndexListWidget,
//        array(
//            'contextInfo' => $contextInfo,
//            'ownsWidgets' => array(
//                  WacComponentList::$moduleToolBar,
//                  WacComponentList::$moduleList
//              )
//));
$params = array(
    'contextInfo'   => $contextInfo,
    'enableWidgets' => array(                                       // enable sub widgets
                  WacComponentList::$moduleToolBar,
                  WacComponentList::$moduleList
    )
);

echo WacWidgetHelper::getInstance()->getWidget(
        WacModule::getName("wacCommon"),             // be invoked module name
        WacComponentList::$moduleIndexListWidget,    // be invoked widget name
        $contextInfo,                                // current module context info
        array(                                       // enable sub widgets
                  WacComponentList::$moduleToolBar,
                  WacComponentList::$moduleList
        )
);
?>