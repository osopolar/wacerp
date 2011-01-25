<?php
  $arrMainModuleTableFields = WacModuleHelper::getModuleTableFields($contextInfo["moduleName"]);  // got all fields from module table, they will be set as hidden fields in the table list
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
                     'mode'         => 'partial',
                     'widgetModule' => $contextInfo["moduleName"],
                     'widgetName'   => WacComponentList::$moduleListingA,
                     'invokeParams' => array(
                                           'contextInfo' => $contextInfo,
                                           'arrMainModuleTableFields' => $arrMainModuleTableFields,  // return sfOutputEscaperArrayDecorator
                                           'subItemModuleName' => $subItemModuleName,
                                           'attachInfo' => $attachInfo
                                           )
                  ));

//  include_component(WacModule::getName("wacCommon"), WacComponentList::$masterControlTableA,
//              array( 'partial'      => $contextInfo["moduleName"]."/".WacComponentList::$moduleListingA,
//                     'invokeParams' => array(
//                                           'contextInfo' => $contextInfo,
//                                           'arrMainModuleTableFields' => $arrMainModuleTableFields,  // return sfOutputEscaperArrayDecorator
//                                           'subItemModuleName' => $subItemModuleName,
//                                           'attachInfo' => $attachInfo
//                                           )
//                  ));

  
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