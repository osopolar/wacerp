<div id="<?php echo $contextInfo["moduleName"]; ?>" style="display: none; height: 100%">
    <div class="ui-layout-center" id="<?php echo $contextInfo["moduleName"]; ?>Center">
        <h3 class="layoutPaneHeader">
            <?php
            echo $contextInfo["moduleName"];
            ?>
            - Center</h3>
        <div class="layoutPaneContent">
            <?php
//            echo "<div id=\"{$contextInfo["moduleName"]}Label\">";
//            echo $contextInfo["moduleName"]."/".$contextInfo["componentName"];
//            echo "</div>";

//              include_component(WacModule::getInstance()->getName("wacCountry"), WacComponentList::$inlineTableWidget);
//              include_component(WacModule::getInstance()->getName("wacSystemParameter"), WacComponentList::$moduleIndexListWidget);

//            echo WacWidgetHelper::getInstance()->getWidget(
//                    WacModule::getInstance()->getName("wacCategory"), // be invoked module name
//                    WacComponentList::$categoryManagerWidget, // be invoked widget name
//                    array(
//                        'contextInfo' => $contextInfo, // current module context info
//                        'enableWidgets' => array(// enable sub widgets
//                            WacComponentList::$moduleTree
//                        )
//                    )
//            );
            ?>
        </div>
        <div class="layoutPaneFooter">
            Center - Footer
        </div>
    </div>

    <div class="ui-layout-north">
        <div class="layoutPaneContent">
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - North
        </div>
        <div class="layoutPaneFooter">North - Footer</div>
    </div>
    
    <div class="ui-layout-south">
        <div class="layoutPaneContent">
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - South
        </div>
    </div>

    <div class="ui-layout-west">
        <div class="layoutPaneHeader">West Header</div>
        <div class="layoutPaneSubhead">East Sub Header</div>
        <div class="layoutPaneContent">
            <?php
        echo $contextInfo["moduleName"];
        ?>
        - West
        </div>
       <div class="layoutPaneFooter">West - Footer</div>
    </div>

    <div class="ui-layout-east">
        <div class="layoutPaneHeader">East Header</div>
        <div class="layoutPaneSubhead">East Sub Header</div>
        <div class="layoutPaneContent">
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - East
        </div>
        <div class="layoutPaneFooter">East - Footer</div>
    </div>
</div>