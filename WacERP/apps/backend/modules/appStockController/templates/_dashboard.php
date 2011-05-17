<div id="container" class="wacPanelContainer">
    <div id="lLeft" class="wacPanelLeft">
        <div id="storehousePanel" class="wacNavPanel">
            <h3>Storehouse</h3>
            <div>
		Panel's initial options:
                <ul>
                    <li>collapseType = slide-left</li>
                    <li>trueVerticalText = true</li>
                    <li>vHeight = 150px</li>
                    <li>width = 280px</li>
                </ul>
                <b>Notes:</b>
                <ul>
                    <li>'trueVerticalText' option forces collapsed panel's title to be rendered vertically (i.e. rotated, read from bottom to top) in contrast with 'Left panel #1'.</li>
                    <li>'vHeight' option set to '150px' restricts panel's high in folded state.</li>
                    <li>Panels width is set to '280px', so when unfolded it's slightly narrower than 'Left panel #1' and 'Left panel #3'.</li>
                    <li>Panels width is set to '280px', so when unfolded it's slightly narrower than 'Left panel #1' and 'Left panel #3'.</li>
                </ul>
                <hr style="width:100%; float:inherit;" class="wacFormRuler">
                <div align="right">
                    <button id="add">add</button>
                    <button id="del">del</button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $("#storehousePanel").ready(function(){
                $('#add').button({text: false,icons: {primary: "ui-icon-plusthick"}});
                $('#del').button({text: false,icons: {primary: "ui-icon-minusthick"}});
            }
        );
        </script>
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
        $('#storehousePanel').panel({
            collapseType:'slide-left',
            trueVerticalText:true,
            vHeight:'150px',
            width:'280px'
        });
        
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