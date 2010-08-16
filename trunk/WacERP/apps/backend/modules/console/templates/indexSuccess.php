<?php
$contextInfo = array(
    "moduleName" => sfContext::getInstance()->getModuleName(),
    "actionName" => sfContext::getInstance()->getActionName()
);

?>

<div class="ui-layout-west">
    <div class="header"></div>
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
    <ul class="toolbar">
        <li id="btnAppStockManagement" class="first"><span></span>AppStockManagement</li>
        <li id="btnAppSystemManagement"><span></span>AppSystemManagement</li>
        <li id="btnOther"><span></span>App3</li>
    </ul>
</div>


<div class="ui-layout-south">
    <div class="header"></div>
    <div class="subhead"></div>
    <div class="content"></div>
    <div class="footer"></div>
</div>


<div id="wac_app_container">
    <?php
            //mainItem form, hidden form interface
            include_component("appStockManagement", "layout",
                    array()
            );
    ?>

    <?php
            //mainItem form, hidden form interface
            include_component("appSystemManagement", "layout",
                    array()
            );
    ?>
</div>