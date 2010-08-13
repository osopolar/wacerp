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
    <div class="header">Outer - North</div>
    <div class="content">
		I only have toggler when 'closed' - I cannot be resized - and I do not 'slide open'
    </div>
    <ul class="toolbar">
        <li id="btnAppStockManagement" class="first"><span></span>App1</li>
        <li id="btnAppSystemManagement"><span></span>App2</li>
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
</div>