<?php
$attachInfo = array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo));
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$attachInfo['uiid'];
$componentGlobalName  = WacModuleHelper::getDesktopId($moduleName, $attachInfo);
$componentGlobalId    = "#".$componentGlobalName;
?>
<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>

<div id="<?php echo $componentGlobalName;?>" class="wacPanelContainer">
    <div id="lLeft_<?php echo $componentGlobalName;?>" class="wacPanelLeft">
        <?php
            include_component("wacStorehouse", "navPanel");
        ?>
    </div>

    <div id="lRight_<?php echo $componentGlobalName;?>" class="wacPanelRight">
        <div id="infoNotificationPanel" class="wacNavPanel">
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
    </div>
    <div id="lCenter_<?php echo $componentGlobalName;?>" class="wacPanelCenter">
        <div id="content_<?php echo $componentGlobalName;?>" class="wacPanelDesktop">
            <p>
                <b>Feel free to examine html of this page.</b>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
        
        $('#infoNotificationPanel').panel({
            collapseType:'slide-right',
            collapsed:true,
            trueVerticalText:true,
            vHeight:'160px',
            width:'200px'
        });
    });

    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;
        var debug = true;
//        this.prototype      = null;

        this.moduleName        = <?php echo "'{$moduleName}'" ?>;
        this.moduleGlobalName  = <?php echo "'{$moduleGlobalName}'" ?>;
        this.componentGlobalName = "<?php echo $componentGlobalName; ?>";
        this.componentGlobalId = "<?php echo $componentGlobalId; ?>";
        this.contentId = "#content_" + <?php echo "'{$componentGlobalName}'" ?>;

        this.init = function(){
//            _self.prototype.init(_self);
            this.initLayout();
            this.initData();
            this.bindEvents();
        };

        this.initLayout = function(){
//            _self.prototype.initLayout(_self);
        };

        this.bindEvents = function(){
//            _self.prototype.bindEvents(_self);
            $(_self.componentGlobalId).hear(_self.componentGlobalId, WacAppConfig.event.app_wac_events_show_add_form, function ($self, data) {  // listenerid, event name, callback
                _self.loadPanelForm(WacAppConfig.event.app_wac_events_show_add_form, data);
            });

            $(_self.componentGlobalId).hear(_self.componentGlobalId, WacAppConfig.event.app_wac_events_show_edit_form, function ($self, data) {  // listenerid, event name, callback
//                Wac.log(data, debug);
                _self.loadPanelForm(WacAppConfig.event.app_wac_events_show_edit_form, data);
            });

        };

        this.initData = function(){
//            _self.prototype.initData(_self);
        };

        this.initDataCallBack = function(jsonData){
//            _self.prototype.initDataCallBack(_self, jsonData);
        };

        this.loadPanelForm = function(evt, data){
//            Wac.log(data, debug);
//            Wac.log('div[id*="formPanel_'+ data.moduleName +'"]'+ " : " + $('div[id*="formPanel_'+ data.moduleName +'"]').length, debug);
            if($('div[id*="formPanel_'+ data.moduleName +'"]').length == 0){
                $(_self.contentId).load(
                      WacAppConfig.baseUrl + data.moduleName + "/getPanelForm",
                      {dataFormat: "html"}
                );
            }
            else{
                $.shout(data.moduleName + evt, data);
            }
        }

        this.init();  // init method
    }

</script>
<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>