<?php
$attachInfo = array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo));
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$attachInfo['uiid'];
$componentGlobalName  = WacModuleHelper::getManagementPanelId($moduleName, $attachInfo);
$componentGlobalId    = "#".$componentGlobalName;
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>

<div id="<?php echo $componentGlobalName;?>" class="wacNavPanel">
    <h3><?php echo __("Business").__("Management");?></h3>
    <div id="content_<?php echo $componentGlobalName;?>">
        <ul id="bizmenu_<?php echo $componentGlobalName;?>" class="treeview-black">
            <li>Item 1</li>
            <li>
                <span>Item 2</span>
                <ul>
                    <li>
                        <span>Item 2.1</span>
                        <ul>
                            <li>Item 2.1.1</li>
                            <li>Item 2.1.2</li>
                        </ul>
                    </li>
                    <li>Item 2.2</li>
                    <li class="closed">
                        <span>Item 2.3 (closed at start)</span>
                        <ul>
                            <li>Item 2.3.1</li>
                            <li>Item 2.3.2</li>
                        </ul>
                    </li>
                </ul>
            </li>
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
            $("#bizmenu_" + _self.componentGlobalName).treeview({
                collapsed: false,
                persist: "cookie",
                cookieId: "treeview-bizmenu"
            });

            $(_self.componentGlobalId).panel({
                collapseType:'slide-left',
//                collapsed:true,
                trueVerticalText:true,
                vHeight:'150px',
                width:'280px'
            });
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