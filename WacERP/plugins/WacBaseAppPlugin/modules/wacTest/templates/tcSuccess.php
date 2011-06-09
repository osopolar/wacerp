<div id="container" class="wacPanelContainer">
    <div id="lLeft" class="wacPanelLeft">
        <?php
//            include_component("wacStorehouse", "navPanel");
        ?>
    </div>
    <?php
            include_component("appStockController", "desktop");
//            include_component("wacStorehouse", "modulePanelForm", array(
//                            'invokeParams' => array(
//                                'contextInfo' => $contextInfo,
//                                'attachInfo' => array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo))
//                        )));
    ?>
</div>
