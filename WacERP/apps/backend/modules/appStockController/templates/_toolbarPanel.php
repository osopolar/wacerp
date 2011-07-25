<?php
$attachInfo = array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo));
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$attachInfo['uiid'];
$componentGlobalName  = WacModuleHelper::getNavPanelId($moduleName, $attachInfo);
$componentGlobalId    = "#".$componentGlobalName;
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>

<div id="<?php echo $componentGlobalName;?>" class="wacNavPanel">
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

<script type="text/javascript">
    $(document).ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });

    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;

        this.moduleName        = <?php echo "'{$moduleName}'" ?>;
        this.moduleGlobalName  = <?php echo "'{$moduleGlobalName}'" ?>;
        this.componentGlobalName = "<?php echo $componentGlobalName; ?>";
        this.componentGlobalId = "<?php echo $componentGlobalId; ?>";
        this.panelId = "#content_" + <?php echo "'{$componentGlobalName}'" ?>;

        this.init = function(){
            _self.initLayout();
            _self.initData();
            _self.bindEvents();
        };

        this.initLayout = function(){
            $(_self.componentGlobalId).panel({
                collapseType:'slide-right',
                collapsed:true,
                trueVerticalText:true,
                vHeight:'160px',
                width:'200px'
            });

//            $(_self.componentGlobalId).panel({
//                collapseType:'slide-left',
//                trueVerticalText:true,
//                vHeight:'150px',
//                width:'280px'
//            });
        };

        this.initData = function(){};

        this.bindEvents = function(){
//            $("#mp_" + _self.componentGlobalName).bind("click", function(){
//                $.shout(WacAppConfig.event.app_wac_events_show_management_panel, {moduleName: "materialPurchase"});
//            });
//
//            $("#mc_" + _self.componentGlobalName).bind("click", function(){
//                $.shout(WacAppConfig.event.app_wac_events_show_management_panel, {moduleName: "materialCategory"});
//            });
        };

        this.init();  // init method
    }
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>