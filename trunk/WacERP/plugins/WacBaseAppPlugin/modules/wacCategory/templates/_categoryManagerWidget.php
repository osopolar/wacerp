<?php

/*
 *  use for creating inline list widget
 *  here defines widgets logic of the module
 */

$attachInfo = array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo));
$widgetName = WacWidgetHelper::getInstance()->getWidgetName(__FILE__, $contextInfo['moduleName'], $attachInfo);

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
}

echo "</div>\n\n";
OutputHelper::getInstance()->writeNote("{$widgetName}, end");
?>