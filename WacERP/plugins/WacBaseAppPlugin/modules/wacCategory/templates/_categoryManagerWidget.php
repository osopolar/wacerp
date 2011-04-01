<?php

/*
 *  use for creating inline list widget
 *  here defines widgets logic of the module
 */

$attachInfo = array("name" => WacWidgetHelper::getInstance()->getUiAppName($contextInfo));
//$widgetName = WacModuleHelper::getWidgetId($contextInfo["moduleName"], $attachInfo);
$widgetName = WacWidgetHelper::getInstance()->getWidgetName(__FILE__, $attachInfo);

OutputHelper::getInstance()->writeNote("{$widgetName}, begin");
echo "<div id=\"{$widgetName}\">\n\n";
if (WacWidgetHelper::enableWidget(WacComponentList::$moduleTree, $enableWidgets)) {
    include_component(WacModule::getInstance()->getName("wacCategory"), WacComponentList::$moduleTree,
            array(
                'invokeParams' => array(
                    'contextInfo' => $contextInfo,
                    'attachInfo' => $attachInfo
            ))
    );
//    include_component(WacModule::getInstance()->getName("wacCommon"), WacComponentList::$embedWidget,
//            array(
//                'mode' => 'component',
//                'widgetModule' => WacWidgetHelper::getModuleName($contextInfo, WacComponentList::$moduleTree),
//                'widgetName'   => WacComponentList::$moduleTree,
//                'invokeParams' => array(
//                    'contextInfo' => $contextInfo,
//                    'attachInfo' => $attachInfo
//                )
//    ));
}

echo "</div>\n\n";
OutputHelper::getInstance()->writeNote("{$widgetName}, end");
?>