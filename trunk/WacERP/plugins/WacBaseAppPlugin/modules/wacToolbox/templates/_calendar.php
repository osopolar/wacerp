<?php
$moduleName           = $invokeParams['contextInfo']['moduleName'];
$moduleGlobalName     = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName  = WacModuleHelper::getElementId($moduleName, $invokeParams['attachInfo'], "calendar");
$componentGlobalId    = "#".$componentGlobalName;
$triggerEvent         = $invokeParams['attachInfo']["button"]->triggerEvent;
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
//            $(document).hear(_self.componentGlobalId, "<?php echo $triggerEvent ?>", function ($self, data) {  // listenerid, event name, callback
//                Wac.log("sth happen");
//            });
        };

        this.init();  // init method
    }
</script>