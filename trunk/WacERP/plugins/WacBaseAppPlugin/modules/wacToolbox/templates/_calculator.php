<?php
$moduleName           = $invokeParams['contextInfo']['moduleName'];
$moduleGlobalName     = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName  = WacModuleHelper::getElementId($moduleName, $invokeParams['attachInfo'], "calculator");
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
//            $.fn.calculator.hide = function(calc) {
//			calc.fadeOut(500);
//	    };
        };

        this.initData = function(){};

        this.bindEvents = function(){
            $(document).hear(_self.componentGlobalId, "<?php echo $triggerEvent ?>", function ($self, data) {  // listenerid, event name, callback
                _self.showUI();
            });
        };

        this.showUI = function(){
            if($(_self.componentGlobalId).length==0){
                $("body").append("<div id='" + _self.componentGlobalName + "' align='center' title='"+ $.i18n.prop('Calculator') +"'><div id='calc_" + _self.componentGlobalName + "'></div></div>");
            }

//            $('#calc_' + _self.componentGlobalName).calculator({movable:true,resizable:true, width:160,defaultOpen:false});

            $(_self.componentGlobalId).dialog({
                    bgiframe: true,
                    modal: false,
                    width: 248,
                    height: 268,
                    zIndex: 100,
                    open: function(event, ui) {
                        $('#calc_' + _self.componentGlobalName).calculator({
                            width: 200,
		            height: 200
                        });
                    }
                });

        }

        this.init();  // init method
    }
</script>