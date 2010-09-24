<!-- ControlComponents, begin -->
<?php
  $moduleName = sfContext::getInstance()->getRequest()->getParameter("module");
  $arrMainModuleTableFields = WacModuleHelper::getModuleTableFields($moduleName);
  $subItemModuleName="";
  $attachName = "";

  echo "<div id=\"".WacModuleHelper::getComponentsId($moduleName)."\">\n\n";

//  //  module buttons bar
//  include_component(WacModule::getName("wacCommon"), WacComponentList::$masterControlTableA,
//              array( 'partial'      => WacModule::getName("common")."/".WacComponentList::$moduleButtonBar,
//                     'invokeParams' => array(
//                                           'moduleName' => $moduleName,
//                                           'caption'    => WacModule::getCaption($moduleName),
//                                           'attachName' => $attachName
//                                           )
//                  ));

  // model list
  include_component(WacModule::getName("wacCommon"), WacComponentList::$masterControlTableA,
              array( 'partial'      => $moduleName."/".WacComponentList::$moduleListingA,
                     'invokeParams' => array(
                                           'moduleName' => $moduleName,
                                           'caption'    => WacModule::getCaption($moduleName),
                                           'arrMainModuleTableFields' => $arrMainModuleTableFields,  // return sfOutputEscaperArrayDecorator
                                           'subItemModuleName' => $subItemModuleName,
                                           'attachName' => $attachName
                                           )
                  ));

  //mainItem form, hidden form interface
//  include_component($moduleName, WacComponentList::$moduleForm,
//              array( 'partial'      => $moduleName."/".WacComponentList::$moduleForm,
//                     'invokeParams' => array(
//                                           'moduleName' => $moduleName,
//                                           'caption'    => WacModule::getCaption($moduleName),
//                                           )
//                  ));

  echo "</div>\n\n";
?>
<!-- ControlComponents, end -->