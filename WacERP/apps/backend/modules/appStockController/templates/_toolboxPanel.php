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
                "<li class=\"ui-button ui-corner-all ui-state-default ui-button-text-icon-primary\" title=\"%s\" triggerEvent=\"%s\" invokeModuleName=\"%s\" invokeAction=\"%s\">
                    <span class=\"ui-button-icon-primary ui-icon %s\"></span>
                    <span class=\"ui-button-text\">%s</span>
                </li>";
                if(count($toolboxBtns)>0){
                    foreach($toolboxBtns as $toolboxBtn){
                        if($toolboxBtn->enable){
                            printf($liPattern, $toolboxBtn->label, $toolboxBtn->triggerEvent, $toolboxBtn->invokeModuleName, $toolboxBtn->invokeAction, $toolboxBtn->iconCss, $toolboxBtn->label);
                        }
                    }
                }
            ?>
        </ol>
    </div>
</div>

<?php
if(count($toolboxBtns)>0){
    foreach($toolboxBtns as $toolboxBtn){
        if($toolboxBtn->loadComponent && $toolboxBtn->enable){
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
            $("#toolbox_" + _self.componentGlobalName).selectable({
                stop: function(event, ui) {
                        var index;
                        $( ".ui-selected", this ).each(function() {
                            $.shout($(this).attr("triggerEvent"), {
                                moduleName: $(this).attr("invokeModuleName"),
                                action: $(this).attr("invokeAction")
                            });
                        }); 
                    }
            });

            $(_self.componentGlobalId).panel({
                collapseType:'slide-right',
                collapsed:true,
                trueVerticalText:true,
                vHeight:'160px',
                width:'200px'
//                width:'200px',
//                titleTextClass:"wacToolbox"
            });
        };

        this.initData = function(){};

        this.bindEvents = function(){};

        this.init();  // init method
    }
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>