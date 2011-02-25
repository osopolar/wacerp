<?php
/*
 *  use for creating inline list widget
 *  here defines widgets logic of the module
 */

  $subItemModuleName="";
  $attachInfo = array("name"=>"");

  OutputHelper::getInstance()->writeNote("{$contextInfo["moduleName"]}, begin");
  echo "<div id=\"".WacModuleHelper::getComponentsId($contextInfo["moduleName"])."\">\n\n";

  if (WacComponentList::ownsWidget(WacComponentList::$moduleToolBar, $ownsWidgets)) {
  OutputHelper::getInstance()->writeNote("{$contextInfo["moduleName"]} ModuleToolbar Component Included.");
  include_component(WacModule::getName("wacCommon"), WacComponentList::$embedWidget,
              array(
                     'mode'         => 'partial',
                     'widgetModule' => WacModule::getName("wacCommon"),
                     'widgetName'   => WacComponentList::$moduleToolBar,
                     'invokeParams' => array(
                                           'contextInfo' => $contextInfo,
                                           'attachInfo' => $attachInfo
                                           )
                  ));
  }

  if (WacComponentList::ownsWidget(WacComponentList::$moduleList, $ownsWidgets)) {
  OutputHelper::getInstance()->writeNote("{$contextInfo["moduleName"]} ModuleList Component Included.");
  include_component(WacModule::getName("wacCommon"), WacComponentList::$embedWidget,
              array(
                     'mode'         => 'component',
                     'widgetModule' => WacModule::getName("wacCommon"),
                     'widgetName'   => WacComponentList::$baseInlineTableA,
                     'invokeParams' => array(
                                           'contextInfo' => $contextInfo,
                                           'subItemModuleName' => $subItemModuleName,
                                           'attachInfo' => $attachInfo
                                           )
                  ));
  }

  echo "</div>\n";
  OutputHelper::getInstance()->writeNote("{$contextInfo["moduleName"]}, end");
?>