<!-- ControlTable, begin -->
<?php
  include_component('common', 'controlTable1',
              array( 'partial'      => WacModule::getName("common")."/".WacControlTableType::$baseSingleControlTablePermission,
                     'invokeParams' => array(
                                           'moduleName' => sfContext::getInstance()->getRequest()->getParameter("module"),
                                           'caption'    => WacModule::getCaption(sfContext::getInstance()->getRequest()->getParameter("module")),
                                           )
                  ));
?>
<!-- ControlTable, end -->