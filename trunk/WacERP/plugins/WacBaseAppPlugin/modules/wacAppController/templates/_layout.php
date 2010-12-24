<div class="ui-layout-west">
    <div class="header">a1</div>
    <div class="subhead"></div>
    <div class="content"></div>
    <div class="footer"></div>

</div>

<div class="ui-layout-east">
    <div class="header"></div>
    <div class="subhead"></div>
    <div class="content"></div>
    <div class="footer"></div>
</div>

<div class="ui-layout-north">
    <div class="header">
        <?php
            echo $contextInfo["moduleName"];
        ?>
        - North
    </div>
    <div class="content">
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
    <div class="header"></div>
    <div class="subhead"></div>
    <div class="content"></div>
    <div class="footer"></div>
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