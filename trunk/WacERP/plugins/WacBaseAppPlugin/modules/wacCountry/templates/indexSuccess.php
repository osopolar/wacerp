<!-- ControlTable, begin -->
<?php
  include_component(WacModule::getName("wacCommon"), WacControlTableType::$masterControlTableA,
              array( 'partial'      => WacModule::getName("wacCommon")."/".WacControlTableType::$baseSingleControlTableA,
                     'invokeParams' => array(
                                           'moduleName' => $contextInfo["moduleName"],   //$contextInfo defined by WacCommonAction
                                           'caption'    => WacModule::getCaption($contextInfo["moduleName"]),
                                           )
                  ));
?>
<!-- ControlTable, end -->