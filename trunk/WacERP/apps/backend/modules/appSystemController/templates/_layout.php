<div id="<?php echo $contextInfo["moduleName"]; ?>" style="display: none; height: 100%">
    <div class="ui-layout-center ui-helper-reset ui-widget-content" id="<?php echo $contextInfo["moduleName"]; ?>Center">
        <h3 class="ui-widget-header ui-corner-top ui-helper-clearfix">
            <?php
            echo $contextInfo["moduleName"];
            ?>
            - Center</h3>
        <div class="content" id="<?php echo $contextInfo["moduleName"]; ?>Tabs">
            <ul></ul>
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
        <?php
        include_partial("wacAppController/copyrightFooter", $contextInfo);
        ?>
    </div>

    <div class="ui-layout-west">
        <div class="content">
            <table id="<?php echo $contextInfo["moduleName"];?>Menu"></table>
        </div>
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