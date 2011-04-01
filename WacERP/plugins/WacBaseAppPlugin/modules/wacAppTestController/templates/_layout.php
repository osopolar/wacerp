<div id="<?php echo $contextInfo["moduleName"]; ?>" style="display: none; height: 100%">
    <div class="ui-layout-center" id="<?php echo $contextInfo["moduleName"]; ?>Center">
        <h3 class="header">
            <?php
            echo $contextInfo["moduleName"];
            ?>
            - Center</h3>
        <div class="content">
            <?php
//            echo "<div id=\"{$contextInfo["moduleName"]}Label\">";
//            echo $contextInfo["moduleName"]."/".$contextInfo["componentName"];
//            echo "</div>";

            echo WacWidgetHelper::getInstance()->getWidget(
                    WacModule::getInstance()->getName("wacCategory"), // be invoked module name
                    WacComponentList::$categoryManagerWidget, // be invoked widget name
                    array(
                        'contextInfo' => $contextInfo, // current module context info
                        'enableWidgets' => array(// enable sub widgets
                            WacComponentList::$moduleTree
                        )
                    )
            );
            ?>
        </div>
        <div class="footer">
            Center - Footer
        </div>
    </div>

    <div class="ui-layout-north">
        <div class="content">
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - North
        </div>
        <div class="footer">North - Footer</div>
    </div>
    
    <div class="ui-layout-south">
        <div class="content">
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - South
        </div>
    </div>

    <div class="ui-layout-west">
        <div class="header">West Header</div>
        <div class="subhead">East Sub Header</div>
        <div class="content">
            <?php
        echo $contextInfo["moduleName"];
        ?>
        - West
        </div>
       <div class="footer">West - Footer</div>
    </div>

    <div class="ui-layout-east">
        <div class="header">East Header</div>
        <div class="subhead">East Sub Header</div>
        <div class="content">
        <?php
        echo $contextInfo["moduleName"];
        ?>
        - East
        </div>
        <div class="footer">East - Footer</div>
    </div>
</div>