<div class="ui-layout-west">
    <div class="layoutPaneHeader"></div>
    <div class="layoutPaneSubhead"></div>
    <div class="layoutPaneContent"></div>
    <div class="layoutPaneFooter"></div>

</div>

<div class="ui-layout-east">
    <div class="layoutPaneHeader"></div>
    <div class="layoutPaneSubhead"></div>
    <div class="layoutPaneContent"></div>
    <div class="layoutPaneFooter"></div>
</div>

<div class="ui-layout-north">
    <div class="layoutPaneHeader">
        <?php
            echo $contextInfo["moduleName"];
        ?>
        - North
    </div>
    <div class="layoutPaneContent">
        <?php
            echo $contextInfo["moduleName"];
        ?>
        common application header content
    </div>
    <ul class="toolbar" id="appNavBar">
        <li id="btnAppStockController" class="first"><span></span>AppStockController</li>
        <li id="btnWacAppSystemController"><span></span>AppSystemController</li>
        <li id="btnWacAppTestController"><span></span>AppTestController</li>
        <li id="btnLogout"><span></span>Logout</li>
    </ul>
</div>


<div class="ui-layout-south">
    <div class="layoutPaneHeader"></div>
    <div class="layoutPaneSubhead"></div>
    <div class="layoutPaneContent"></div>
    <div class="layoutPaneFooter"></div>
</div>


<div id="wacAppContainer">
    <?php
            //mainItem form, hidden form interface
            include_component("appStockController", "main",
                    array()
            );
    ?>

    <?php
            //mainItem form, hidden form interface
            include_component("wacAppSystemController", "main",
                    array()
            );
    ?>

    <?php
            //mainItem form, hidden form interface
            include_component("wacAppTestController", "main",
                    array()
            );
    ?>
</div>