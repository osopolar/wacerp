<?php

/*
 *  here defines widgets logic of the module
 */

include_partial(WacModule::getName("wacCommon") . "/" . WacComponentList::$moduleIndexInlineWidget,
        array(
            'contextInfo' => $contextInfo,
            'ownsWidgets' => array(
                  WacComponentList::$moduleToolBar,
                  WacComponentList::$moduleList
              )
));
?>