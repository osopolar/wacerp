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
            <li>
                <span><?php echo __("Purchase").__("Management");?></span>
                <ul>
                    <li class="wacCursor" id="mp_<?php echo $componentGlobalName; ?>"><span><?php echo __("Material Purchase");?></span></li>
                </ul>
            </li>
            <li>
                <span><?php echo __("Stock").__("Management");?></span>
                <ul>
                    <li class="wacCursor"><span>Item 2.1</span></li>
                </ul>
            </li>
            <li>
                <span><?php echo __("Sale").__("Management");?></span>
                <ul>
                    <li class="wacCursor"><span>Item 3.1</span></li>
                </ul>
            </li>
            <li>
                <span><?php echo __("Goods").__("Management");?></span>
                <ul>
                    <li class="wacCursor" id="mc_<?php echo $componentGlobalName; ?>"><span><?php echo __("Material").__("Category");?></span></li>
                    <li class="wacCursor" id="mm_<?php echo $componentGlobalName; ?>"><span><?php echo __("Material").__("Management");?></span></li>
                    <li class="wacCursor" id="pc_<?php echo $componentGlobalName; ?>"><span><?php echo __("Product").__("Category");?></span></li>
                    <li class="wacCursor" id="pm_<?php echo $componentGlobalName; ?>"><span><?php echo __("Product").__("Management");?></span></li>
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
            $(_self.componentGlobalId).panel({
                collapseType:'slide-left',
                collapsed:true,
                trueVerticalText:true,
                vHeight:'150px',
                width:'280px'
            });

            $("#bizmenu_" + _self.componentGlobalName).treeview({
                collapsed: false,
                persist: "cookie",
                cookieId: "treeview-black"
            });

        };

        this.initData = function(){};
        
        this.bindEvents = function(){
            $("#mp_" + _self.componentGlobalName).bind("click", function(){
                $.shout(WacAppConfig.event.app_wac_events_show_management_panel, {moduleName: "materialPurchase"});
            });

            $("#mc_" + _self.componentGlobalName).bind("click", function(){
                $.shout(WacAppConfig.event.app_wac_events_show_management_panel, {moduleName: "materialCategory"});
            });

            $("#pm_" + _self.componentGlobalName).bind("click", function(){
                $.shout(WacAppConfig.event.app_wac_events_show_management_panel, {moduleName: "wacProduct"});
            });
        };

        this.init();  // init method
    }
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>