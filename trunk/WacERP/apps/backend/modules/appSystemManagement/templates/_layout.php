<div id="<?php echo WacModuleHelper::toSplitName($contextInfo["moduleName"]); ?>" style=" display: none; height: 100%">
    <div class="ui-layout-center" id="<?php echo WacModuleHelper::toSplitName($contextInfo["moduleName"]); ?>_center">
        <h3 class="header">
            <?php
//        echo $contextInfo["moduleName"];
            ?>
            - Center</h3>
        <div class="ui-layout-content">
            <?php
//        echo $contextInfo["moduleName"]."/".$contextInfo["componentName"];
            ?>
        </div>
        <div class="footer"></div>
    </div>

    <div class="ui-layout-north">
        <?php
//    echo $contextInfo["moduleName"];
        ?>
        - North
    </div>
    <div class="ui-layout-south">
        <?php
//    echo $contextInfo["moduleName"];
        ?>
        - South
    </div>
    <div class="ui-layout-west">
        <?php
//    echo $contextInfo["moduleName"];
        ?>
        - West</div>
    <div class="ui-layout-east">
        <?php
//    echo $contextInfo["moduleName"];
        ?>
        - East   dddd
    </div>
</div>