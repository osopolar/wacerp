<!-- ControlComponents, begin -->
<?php
  $arrMainModuleTableFields = WacModuleHelper::getModuleTableFields($contextInfo["moduleName"]);
  $subItemModuleName="";
  $attachInfo = array("name"=>"");

  echo "<div id=\"".WacModuleHelper::getComponentsId($contextInfo["moduleName"])."\">\n\n";

  // module buttons bar
  include_component(WacModule::getName("wacCommon"), WacComponentList::$masterControlTableA,
              array( 'partial'      => WacModule::getName("wacCommon")."/".WacComponentList::$moduleButtonBar,
                     'invokeParams' => array(
                                           'contextInfo' => $contextInfo,
                                           'attachInfo' => $attachInfo
                                           )
                  ));

  // model list
  include_component(WacModule::getName("wacCommon"), WacComponentList::$masterControlTableA,
              array( 'partial'      => $contextInfo["moduleName"]."/".WacComponentList::$moduleListingA,
                     'invokeParams' => array(
                                           'contextInfo' => $contextInfo,
                                           'arrMainModuleTableFields' => $arrMainModuleTableFields,  // return sfOutputEscaperArrayDecorator
                                           'subItemModuleName' => $subItemModuleName,
                                           'attachInfo' => $attachInfo
                                           )
                  ));

  //mainItem form, hidden form interface
  include_component($contextInfo["moduleName"], WacComponentList::$moduleForm,
              array( 'partial'      => $contextInfo["moduleName"]."/".WacComponentList::$moduleForm,
                     'invokeParams' => array(
                                           'contextInfo' => $contextInfo,
                                           'attachInfo'  => $attachInfo,
                                           )
                  ));

  echo "</div>\n\n";
?>
<!-- ControlComponents, end -->