<?php
$attachInfo = array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo));
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$attachInfo['uiid'];
$componentGlobalName  = WacModuleHelper::getNavPanelId($moduleName, $attachInfo);
$componentGlobalId    = "#".$componentGlobalName;
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>

<div id="<?php echo $componentGlobalName;?>" class="wacNavPanel">
    <h3><?php echo __("Management");?></h3>
    <div id="content_<?php echo $componentGlobalName;?>">
        <ul id="list_<?php echo $componentGlobalName; ?>" class="wacTableField">
            <li class="wacCursor" id="mpo_<?php echo $componentGlobalName; ?>"><?php echo __("Material Purchase Order");?></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="wacFormClear"></div>
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
                trueVerticalText:true,
                vHeight:'150px',
                width:'280px'
            });
        };

        this.initData = function(){};
        
        this.bindEvents = function(){
            $("#mpo_" + _self.componentGlobalName).bind("click", function(){
                $.shout(WacAppConfig.event.app_wac_events_show_management_panel, {moduleName: "wacPurchaseOrder"});
            })
        };

        this.init();  // init method
    }
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>