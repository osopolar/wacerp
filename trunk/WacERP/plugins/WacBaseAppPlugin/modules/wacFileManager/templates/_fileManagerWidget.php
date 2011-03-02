<?php

/*
 *  use for creating inline list widget
 *  here defines widgets logic of the module
 */

$attachInfo = array("name" => "");
$widgetName = WacModuleHelper::getWidgetId($contextInfo["moduleName"], $attachInfo);

OutputHelper::getInstance()->writeNote("{$widgetName}, begin");
echo "<div id=\"{$widgetName}\">\n\n";

//if (WacWidgetHelper::enableWidget(WacComponentList::$moduleToolBar, $enableWidgets)) {
//    OutputHelper::getInstance()->writeNote("{$contextInfo["moduleName"]} ModuleToolbar Component Included.");
//    include_component(WacModule::getInstance()->getName("wacCommon"), WacComponentList::$embedWidget,
//            array(
//                'mode' => 'partial',
//                'widgetModule' => WacWidgetHelper::getModuleName($contextInfo, WacComponentList::$moduleToolBar),
//                'widgetName'   => WacComponentList::$moduleToolBar,
//                'invokeParams' => array(
//                    'contextInfo' => $contextInfo,
//                    'attachInfo' => $attachInfo
//                )
//    ));
//}

if (WacWidgetHelper::enableWidget(WacComponentList::$moduleTree, $enableWidgets)) {
    include_component(WacModule::getInstance()->getName("wacCommon"), WacComponentList::$embedWidget,
            array(
                'mode' => 'component',
                'widgetModule' => WacWidgetHelper::getModuleName($contextInfo, WacComponentList::$moduleTree),
                'widgetName'   => WacComponentList::$moduleTree,
                'invokeParams' => array(
                    'contextInfo' => $contextInfo,
                    'attachInfo' => $attachInfo
                )
    ));
}

echo "</div>\n\n";
OutputHelper::getInstance()->writeNote("{$widgetName}, end");
?>