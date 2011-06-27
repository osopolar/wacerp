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
    include_component($contextInfo["moduleName"], WacComponentList::$moduleDialogTree,
            array(
                'invokeParams' => array(
                    'contextInfo' => $contextInfo,
                    'attachInfo' => $attachInfo
            ))
    );
}

if (WacWidgetHelper::enableWidget(WacComponentList::$moduleTreeEntityDialog, $enableWidgets)) {
    include_component($contextInfo['moduleName'], WacComponentList::$moduleTreeEntityDialog,
            array(
                'invokeParams' => array(
                    'contextInfo' => $contextInfo,
                    'attachInfo'  => $attachInfo,
                    'config'      => array(
                        "isHidden" => true
                    )
                )
    ));
}

echo "</div>\n\n";
OutputHelper::getInstance()->writeNote("{$widgetName}, end");
?>