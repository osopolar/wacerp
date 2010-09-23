<!-- ControlTable, begin -->
<?php
  include_component(WacModule::getName("wacCommon"), WacControlTableType::$masterControlTableA,
              array( 'partial'      =>  $contextInfo["moduleName"]."/".WacControlTableType::$baseSingleControlTableA,
                     'invokeParams' => array(
                                           'moduleName' => $contextInfo["moduleName"],   //$contextInfo defined by WacCommonAction
                                           'caption'    => WacModule::getCaption($contextInfo["moduleName"]),
                                           )
                  ));
?>
<!-- ControlTable, end -->