<div id="container" class="wacPanelContainer">
    <div id="lLeft" class="wacPanelLeft">
        <?php
            include_component("wacStorehouse", "navPanel");
        ?>
    </div>

    <div id="lRight" class="wacPanelRight">
        <div id="infoNotificationPanel" class="wacNavPanel">
            <h3>Right panel #1</h3>
            <div>
		Panel's initial options:
                <ul>
                    <li>collapseType = slide-right</li>
                    <li>collapsed = true</li>
                    <li>trueVerticalText = true</li>
                    <li>vHeight = 237px</li>
                    <li>width = 200px</li>
                </ul>
                <b>Notes:</b>
                <ul>
                    <li>'collapsed' option set to 'true' tells panel to be initially rendered in collapsed state.</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="lCenter" class="wacPanelCenter">
        <div id="desktop" class="wacPanelDesktop">
            <p>
                <b>Feel free to examine html of this page.</b>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#infoNotificationPanel').panel({
            collapseType:'slide-right',
            collapsed:true,
            trueVerticalText:true,
            vHeight:'160px',
            width:'200px'
        });
    }
);
</script>