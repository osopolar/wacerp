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
    include_component(WacModule::getInstance()->getName("wacCommon"), WacComponentList::$embedWidget,
            array(
                'mode' => 'component',
                'widgetModule' => WacWidgetHelper::getModuleName($contextInfo, WacComponentList::$moduleTree),
                'widgetName'   => WacComponentList::$moduleTree,
                'invokeParams' => array(
                    'contextInfo' => $contextInfo,
                    'attachInfo' => $attachInfo,
                    'config'      => array(
                        "labelBranch" => "Folder",
                        "labelNode"   => "File"
                    )
                )
    ));
}

if (WacWidgetHelper::enableWidget(WacComponentList::$moduleUploadForm, $enableWidgets)) {
    include_component($contextInfo['moduleName'], WacComponentList::$moduleUploadForm,
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