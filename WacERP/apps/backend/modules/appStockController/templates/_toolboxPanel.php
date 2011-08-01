<?php
$attachInfo = array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo));
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = WacModuleHelper::getModuleGlobalName($moduleName, $attachInfo);
$componentGlobalName  = WacModuleHelper::getComponentGlobalName($contextInfo, $attachInfo);
$componentGlobalId    = "#".$componentGlobalName;

?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>

<div id="<?php echo $componentGlobalName;?>" class="wacNavPanel">
    <h3><?php echo __("Toolbox");?></h3>
    <div>
        <ol id="toolbox_<?php echo $componentGlobalName;?>" class="toolboxList">
            <?php
                $liPattern =
                "<li class=\"ui-button ui-corner-all ui-state-default ui-button-text-icon-primary\" title=\"%s\">
                    <span class=\"ui-button-icon-primary ui-icon ui-icon-search\"></span>
                    <span class=\"ui-button-text\">%s</span>
                </li>";
                if(count($toolboxBtns)>0){
                    foreach($toolboxBtns as $toolboxBtn){
                        printf($liPattern, $toolboxBtn->label, $toolboxBtn->label);
                    }
                }
            ?>
        </ol>
    </div>
</div>

<?php
if(count($toolboxBtns)>0){
    foreach($toolboxBtns as $toolboxBtn){
        include_component($toolboxBtn->invokeModuleName, $toolboxBtn->invokeComponentName,
                array(
                    'invokeParams' => array(
                        'contextInfo' => $contextInfo,
                        'attachInfo' => array(
                            "button" => $toolboxBtn,   // StdClass, defined in its component
                            "uiid"   => $attachInfo["uiid"]
                        )
                    )
        ));
    }
}
?>

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

        this.init = function(){
            _self.initLayout();
            _self.initData();
            _self.bindEvents();
        };

        this.initLayout = function(){
            $("#toolbox_" + _self.componentGlobalName).selectable();

            $(_self.componentGlobalId).panel({
                collapseType:'slide-right',
//                collapsed:true,
                trueVerticalText:true,
                vHeight:'160px',
                width:'200px'
//                width:'200px',
//                titleTextClass:"wacToolbox"
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