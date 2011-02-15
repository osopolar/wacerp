<?php
/*
 *  here defines widgets logic of the module
 */

  include_partial(WacModule::getName("wacCommon")."/".WacComponentList::$moduleIndexListWidget,
          array(
              'contextInfo'   => $contextInfo,
              'includeWidges' => array(
                  WacComponentList::$moduleToolBar,
                  WacComponentList::$moduleList,
                  WacComponentList::$moduleForm
              )
          ));

?>