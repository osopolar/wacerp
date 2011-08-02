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
        };

        this.initData = function(){};

        this.bindEvents = function(){
            $(document).hear(_self.componentGlobalId, "<?php echo $triggerEvent ?>", function ($self, data) {  // listenerid, event name, callback
                _self.showUI();
            });
        };

        this.showUI = function(){
            $("body").append("<div id='" + _self.componentGlobalName + "' align='center' title='"+ $.i18n.prop('Calendar') +"'><div id='calendar_" + _self.componentGlobalName + "'></div></div>");

            $(_self.componentGlobalId).dialog({
                    bgiframe: true,
                    modal: false,
                    width: 285,
                    height: 280,
                    zIndex: 100,
                    open: function(event, ui) {
                        $( "#calendar_" + _self.componentGlobalName ).datepicker({
//                            changeMonth: true,
//                            changeYear: true
                        });
                    }
//                    buttons: {
//                        Ok: function() {
//                            $(this).dialog('close');
//                        }
//                    }
                });

        }

        this.init();  // init method
    }
</script>