<div id="container" class="wacPanelContainer">
    <div id="lLeft" class="wacPanelLeft">
        <?php
//            include_component("wacStorehouse", "navPanel");
        ?>
    </div>
    <?php
            include_component("appStockController", "desktop");

              // a bug will be pending, duplicated init action implements when open
//              include_component("materialCategory", "moduleManagementPanel", array(
//                            'invokeParams' => array(
//                                'contextInfo' => $contextInfo,
//                                'attachInfo' => array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo))
//                        )));



//            include_component("wacStorehouse", "modulePanelForm", array(
//                            'invokeParams' => array(
//                                'contextInfo' => $contextInfo,
//                                'attachInfo' => array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo))
//                        )));

//            include_component("materialPurchase", "moduleManagementPanel", array(
//                            'invokeParams' => array(
//                                'contextInfo' => $contextInfo,
//                                'attachInfo' => array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo))
//                        )));

            

    ?>
</div>
