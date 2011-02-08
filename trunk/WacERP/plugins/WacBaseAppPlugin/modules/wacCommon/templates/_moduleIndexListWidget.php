<?php
/*
 *  use for creating inline list widget
 *  here defines widgets logic of the module
 */

  $subItemModuleName="";
  $attachInfo = array("name"=>"");

  OutputHelper::getInstance()->writeNote("{$contextInfo["moduleName"]}, begin");
  echo "<div id=\"".WacModuleHelper::getComponentsId($contextInfo["moduleName"])."\">\n\n";

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

  OutputHelper::getInstance()->writeNote("{$contextInfo["moduleName"]} ModuleList Component Included.");
  include_component(WacModule::getName("wacCommon"), WacComponentList::$embedWidget,
              array(
                     'mode'         => 'component',
                     'widgetModule' => $contextInfo["moduleName"],       // for custom module component list
                     'widgetName'   => WacComponentList::$moduleList,
                     'invokeParams' => array(
                                           'contextInfo' => $contextInfo,
                                           'subItemModuleName' => $subItemModuleName,
                                           'attachInfo' => $attachInfo
                                           )
                  ));


  OutputHelper::getInstance()->writeNote("{$contextInfo["moduleName"]} ModuleForm Component Included.");
  include_component($contextInfo["moduleName"], WacComponentList::$moduleForm,
              array(
                     'invokeParams' => array(
                                           'contextInfo' => $contextInfo,
                                           'attachInfo'  => $attachInfo,
                                           )
                  ));

  echo "</div>\n\n";
  OutputHelper::getInstance()->writeNote("{$contextInfo["moduleName"]}, end");
?>