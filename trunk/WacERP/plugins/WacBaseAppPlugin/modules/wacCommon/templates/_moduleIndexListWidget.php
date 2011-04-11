<?php

/*
 *  use for creating inline list widget
 *  here defines widgets logic of the module
 */

$subItemModuleName = "";
$attachInfo = array("uiid" => WacWidgetHelper::getInstance()->getUiid($invokeParams["contextInfo"]));
$widgetName = WacWidgetHelper::getInstance()->getWidgetName(__FILE__, $invokeParams["contextInfo"]['moduleName'], $attachInfo);

OutputHelper::getInstance()->writeNote("{$widgetName}, begin");
echo "<div id=\"{$widgetName}\">\n\n";

if (WacWidgetHelper::enableWidget(WacComponentList::$tableToolbar, $enableWidgets)) {
    OutputHelper::getInstance()->writeNote("{$invokeParams["contextInfo"]["moduleName"]} ModuleToolbar Component Included.");
//    include_component(WacModule::getInstance()->getName("wacCommon"), WacComponentList::$embedWidget,
//            array(
//                'mode' => 'partial',
//                'widgetModule' => WacWidgetHelper::getModuleName($invokeParams["contextInfo"], WacComponentList::$moduleToolBar),
//                'widgetName' => WacComponentList::$moduleToolBar,
//                'invokeParams' => array(
//                    'contextInfo' => $invokeParams["contextInfo"],
//                    'attachInfo' => $attachInfo
//                )
//    ));
    include_component($invokeParams["contextInfo"]["moduleName"], WacComponentList::$tableToolbar,
            array(
                'invokeParams' => array(
                    'contextInfo' => $invokeParams["contextInfo"],
                    'attachInfo' => $attachInfo
                )
    ));
}

if (WacWidgetHelper::enableWidget(WacComponentList::$moduleList, $enableWidgets)) {
    OutputHelper::getInstance()->writeNote("{$invokeParams["contextInfo"]["moduleName"]} ModuleList Component Included.");
//    include_component(WacModule::getInstance()->getName("wacCommon"), WacComponentList::$embedWidget,
//            array(
//                'mode' => 'component',
//                'widgetModule' => WacWidgetHelper::getModuleName($invokeParams["contextInfo"], WacComponentList::$moduleList),
//                'widgetName' => WacComponentList::$moduleList,
//                'invokeParams' => array(
//                    'contextInfo' => $invokeParams["contextInfo"],
//                    'subItemModuleName' => $subItemModuleName,
//                    'attachInfo' => $attachInfo
//                )
//    ));
    include_component($invokeParams["contextInfo"]["moduleName"], WacComponentList::$moduleList,
            array(
                'invokeParams' => array(
                    'contextInfo' => $invokeParams["contextInfo"],
                    'attachInfo' => $attachInfo
                )
    ));
}

if (WacWidgetHelper::enableWidget(WacComponentList::$moduleForm, $enableWidgets)) {
    OutputHelper::getInstance()->writeNote("{$invokeParams["contextInfo"]["moduleName"]} ModuleForm Component Included.");
//    include_component(WacModule::getInstance()->getName("wacCommon"), WacComponentList::$embedWidget,
//            array(
//                'mode' => 'component',
//                'widgetModule' => WacWidgetHelper::getModuleName($invokeParams["contextInfo"], WacComponentList::$moduleForm),
//                'widgetName' => WacComponentList::$moduleForm,
//                'invokeParams' => array(
//                    'contextInfo' => $invokeParams["contextInfo"],
//                    'attachInfo' => $attachInfo
//                )
//    ));
    include_component($invokeParams["contextInfo"]["moduleName"], WacComponentList::$moduleForm,
            array(
                'invokeParams' => array(
                    'contextInfo' => $invokeParams["contextInfo"],
                    'attachInfo' => $attachInfo
                )
    ));
}

echo "\n\n</div>";
OutputHelper::getInstance()->writeNote("{$widgetName}, end");
?>