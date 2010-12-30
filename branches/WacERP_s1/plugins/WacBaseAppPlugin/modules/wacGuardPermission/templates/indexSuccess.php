<!-- ControlTable, begin -->
<?php
  include_component(WacModule::getName("wacCommon"), WacComponentList::$masterControlTableA,
              array( 'partial'      =>  $contextInfo["moduleName"]."/".WacComponentList::$baseSingleControlTableA,
                     'invokeParams' => array(
                                           'moduleName' => $contextInfo["moduleName"],   //$contextInfo defined by WacCommonAction
                                           'caption'    => WacModule::getCaption($contextInfo["moduleName"]),
                                           )
                  ));
?>
<!-- ControlTable, end -->