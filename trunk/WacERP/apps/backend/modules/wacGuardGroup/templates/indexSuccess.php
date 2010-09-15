<!-- ControlComponents, begin -->
<?php
  $moduleName = sfContext::getInstance()->getRequest()->getParameter("module");
  $objMainModuleTableFields = WacModuleHelper::getModuleTableFields($moduleName);
  $subItemModuleName="";
  $attachName = "";

  echo "<div id=\"".WacModuleHelper::getComponentsId($moduleName)."\">\n\n";

  // module buttons bar
  include_component('common', 'controlTable1',
              array( 'partial'      => WacModule::getName("common")."/".WacControlTableType::$moduleButtonBar,
                     'invokeParams' => array(
                                           'moduleName' => $moduleName,
                                           'caption'    => WacModule::getCaption($moduleName),
                                           'attachName' => $attachName
                                           )
                  ));

  // model list
  include_component('common', 'controlTable1',
              array( 'partial'      => $moduleName."/".WacControlTableType::$modelListingTableA,
                     'invokeParams' => array(
                                           'moduleName' => $moduleName,
                                           'caption'    => WacModule::getCaption($moduleName),
                                           'objMainModuleTableFields' => $objMainModuleTableFields,  // return sfOutputEscaperArrayDecorator
                                           'subItemModuleName' => $subItemModuleName,
                                           'attachName' => $attachName
                                           )
                  ));

  //mainItem form, hidden form interface
  include_component($moduleName, WacControlTableType::$moduleForm,
              array( 'partial'      => $moduleName."/".WacControlTableType::$moduleForm,
                     'invokeParams' => array(
                                           'moduleName' => $moduleName,
                                           'caption'    => WacModule::getCaption($moduleName),
                                           )
                  ));

  echo "</div>\n\n";
?>
<!-- ControlComponents, end -->