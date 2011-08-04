<?php
$moduleName           = $invokeParams['contextInfo']['moduleName'];
$moduleGlobalName     = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName  = WacModuleHelper::getElementId($moduleName, $invokeParams['attachInfo'], "googlemap");
$componentGlobalId    = "#".$componentGlobalName;
$triggerEvent         = $invokeParams['attachInfo']["button"]->triggerEvent;

$gmapApiKey = "ABQIAAAANRL-1tTd9UqL0tHH4ZgduhRPVKtL12S_1pKtvocaS-lDN9oDaBTfQS8oCChlmwXZ9RngVM8zW4AGAw";
?>

<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $gmapApiKey;?>"></script>
<script type="text/javascript" src="/WacBaseAppPlugin/js/jquery/plugins/jquery.gmap/jquery.gmap-1.1.0-min.js"></script>

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
            if($(_self.componentGlobalId).length==0){
                $("body").append("<div id='" + _self.componentGlobalName + "' align='center' title='"+ $.i18n.prop('Google') + $.i18n.prop('Map') +"'><div id='map_" + _self.componentGlobalName + "' style='height:400px; border: 1px solid #777; overflow: hidden;'></div></div>");
            }

            $(_self.componentGlobalId).dialog({
                    bgiframe: true,
                    modal: false,
                    width: 580,
                    height: 450,
                    zIndex: 100,
                    open: function(event, ui) {
                        $( "#map_" + _self.componentGlobalName ).gMap({
                            markers: [{ latitude: 23.08,longitude: 113.14 }],
                            zoom: 5
                        });
                    }
                });

        }

        this.init();  // init method
    }
</script>