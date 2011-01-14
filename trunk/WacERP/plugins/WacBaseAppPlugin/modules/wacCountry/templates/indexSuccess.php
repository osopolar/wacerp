<!-- ControlComponent, begin -->
<?php
//  $arrMainModuleTableFields = WacModuleHelper::getModuleTableFields($contextInfo["moduleName"]);  // got all fields from module table, they will be set as hidden fields in the table list
  $arrMainModuleTableFields = array();
  $subItemModuleName="";
  $attachInfo = array("name"=>"");

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
                     'mode'         => 'partial',
                     'widgetModule' => WacModule::getName("wacCommon"),
                     'widgetName'   => WacComponentList::$baseInlineTableA,
                     'invokeParams' => array(
                                           'contextInfo' => $contextInfo,
                                           'arrMainModuleTableFields' => $arrMainModuleTableFields,  // return sfOutputEscaperArrayDecorator
                                           'subItemModuleName' => $subItemModuleName,
                                           'attachInfo' => $attachInfo
                                           )
                  ));

//  include_component(WacModule::getName("wacCommon"), WacComponentList::$masterControlTableA,
//              array( 'partial'      => WacModule::getName("wacCommon")."/".WacComponentList::$baseSingleControlTableA,
//                     'invokeParams' => array(
//                                           'moduleName' => $contextInfo["moduleName"],   //$contextInfo defined by WacCommonAction
//                                           'caption'    => WacModule::getCaption($contextInfo["moduleName"]),
//                                           )
//                  ));
//
//
  
  echo "</div>\n";
?>
<!-- ControlComponent, end -->