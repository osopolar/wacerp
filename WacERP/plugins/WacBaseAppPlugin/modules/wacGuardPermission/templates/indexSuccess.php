<?php

/*
 *  here defines widgets logic of the module
 */

include_partial(WacModule::getName("wacCommon") . "/" . WacComponentList::$moduleIndexListWidget,
        array(
            'contextInfo' => $contextInfo,
            'ownsWidgets' => array(
                  WacComponentList::$moduleToolBar,
                  WacComponentList::$moduleList
              )
));
?>