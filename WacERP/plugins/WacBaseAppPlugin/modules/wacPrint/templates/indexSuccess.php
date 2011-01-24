<!-- ControlComponents, begin -->
<?php
  $moduleName = sfContext::getInstance()->getRequest()->getParameter("module");

  echo "<div id=\"".WacModuleHelper::getComponentsId($moduleName)."\">\n\n";

  // module toolbar
  include_component(WacModule::getName("wacPrint"), 'printFrame1',
              array( 'invokeParams' => $invokeParams )
          );

  echo "</div>\n\n";
?>
<!-- ControlComponents, end -->