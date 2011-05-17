<div id="<?php echo $contextInfo["moduleName"]; ?>" style="display: none; height: 100%">
    <div class="ui-layout-center" id="<?php echo $contextInfo["moduleName"]; ?>Center">
        <h3 class="layoutPaneHeader">
            <?php
            echo $contextInfo["moduleName"];
            ?>
            - Center</h3>
        <div class="ui-layout-content">
            <?php
//            include_component(WacModule::getInstance()->getName("wacTest"), "panelTest");
            include_component($contextInfo["moduleName"], "dashboard");

//            echo "<div id=\"{$contextInfo["moduleName"]}Label\">";
//            echo $contextInfo["moduleName"]."/".$contextInfo["componentName"];
//            echo "</div>"
            ?>
        </div>
        <div class="layoutPaneFooter"></div>
    </div>

    <div class="ui-layout-north">
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - North
    </div>
    <div class="ui-layout-south">
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - South
    </div>
    <div class="ui-layout-west">
        <div class="layoutPaneHeader"></div>
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - West</div>
    <div class="ui-layout-east">
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - East
    </div>
</div>