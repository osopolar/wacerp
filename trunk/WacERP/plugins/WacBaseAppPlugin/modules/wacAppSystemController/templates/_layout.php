<div id="<?php echo $contextInfo["moduleName"]; ?>" style="display: none; height: 100%">
    <div class="ui-layout-center ui-helper-reset ui-widget-content" id="<?php echo $contextInfo["moduleName"]; ?>Center">
        <h3 class="ui-widget-header ui-corner-top ui-helper-clearfix layoutPaneHeader">
            <?php
            echo $contextInfo["moduleName"];
            ?>
            - Center</h3>
        <div class="layoutPaneContent">
            <div id="<?php echo $contextInfo["moduleName"]; ?>Tabs" style="font-size:12px; overflow:auto;">
                    <ul></ul>
            </div>
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
        <?php
        include_partial("wacAppController/copyrightFooter", $contextInfo);
        ?>
    </div>

    <div class="ui-layout-west">
        <div class="layoutPaneContent">
            <table id="<?php echo $contextInfo["moduleName"];?>Menu"></table>
        </div>
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