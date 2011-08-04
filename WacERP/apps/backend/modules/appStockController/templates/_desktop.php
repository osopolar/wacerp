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
            include_component("wacStorehouse", "navPanel");  // navigation list panel

            include_component("appStockController", "businessPanel");  // management panel
        ?>
    </div>

    <div id="lRight_<?php echo $componentGlobalName;?>" class="wacPanelRight">
        <?php
            include_component("appStockController", "toolboxPanel");  // toolbar panel
        ?>
    </div>
    
    <div id="lCenter_<?php echo $componentGlobalName;?>" class="wacPanelCenter">
        <div id="content_<?php echo $componentGlobalName;?>" class="wacPanelDesktop"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
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
//                Wac.log(data, debug);
            $(_self.componentGlobalId).hear(_self.componentGlobalId, WacAppConfig.event.app_wac_events_show_add_form, function ($self, data) {  // listenerid, event name, callback
                _self.loadFormPanel(WacAppConfig.event.app_wac_events_show_add_form, data);
            });

            $(_self.componentGlobalId).hear(_self.componentGlobalId, WacAppConfig.event.app_wac_events_show_edit_form, function ($self, data) {  // listenerid, event name, callback
                _self.loadFormPanel(WacAppConfig.event.app_wac_events_show_edit_form, data);
            });

            $(_self.componentGlobalId).hear(_self.componentGlobalId, WacAppConfig.event.app_wac_events_show_management_panel, function ($self, data) {  // listenerid, event name, callback
                _self.loadManagementPanel(WacAppConfig.event.app_wac_events_show_management_panel, data);
            });
        };

        this.initData = function(){
//            _self.prototype.initData(_self);
        };

        this.initDataCallback = function(jsonData){
//            _self.prototype.initDataCallback(_self, jsonData);
        };

        this.loadFormPanel = function(evt, data){
            _self.loadPanel("formPanel", "getPanelForm", evt, data);
        };

        this.loadManagementPanel = function(evt, data){
            _self.loadPanel("mgPanel", "getManagementPanel", evt, data);
        };
        
        this.loadPanel = function(uiPanelName, action, evt, data){
//            Wac.log(data, debug);
            var panelContainer = uiPanelName + '_'+ data.moduleName + '_container';

            if($('#'+panelContainer).length == 0){
                $(document).wacPage().showBlockUILoader({id:_self.componentGlobalId});
                $(_self.contentId).prepend("<div id='" + panelContainer + "'></div>");
                $("#" + panelContainer).load(
                      WacAppConfig.baseUrl + data.moduleName + "/" + action,
                      {dataFormat: "html"},
                      function(){
                          _self.setPanelsPos("relative");
//                          $(document).oneTime("2s", function() {
//				_self.setPanelsPos("absolute");
//			  });
                          $(document).wacPage().hideBlockUI(_self.componentGlobalId);
                      }
                );
            }
            else{
                $.shout(data.moduleName + evt, data);
            }
        };

        /*
        *  let the new panels follow the previous panel automatically
         */
        this.setPanelsPos = function(pos){
              $(_self.contentId + " .ui-helper-reset.ui-widget-content.ui-panel-content.ui-corner-bottom").each(function(idx){
                  $(this).css("position", pos);
//                Wac.log( idx + ":" + $(this).css("position"), debug);
              });
        };

        this.init();  // init method
    }

</script>
<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>