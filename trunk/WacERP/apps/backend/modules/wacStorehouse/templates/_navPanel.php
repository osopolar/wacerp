<?php
$attachInfo = array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo));
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$attachInfo['uiid'];
$componentGlobalName  = WacModuleHelper::getNavPanelId($moduleName, $attachInfo);
$componentGlobalId    = "#".$componentGlobalName;
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>

<div id="<?php echo $componentGlobalName;?>" class="wacNavPanel">
    <h3>Storehouse</h3>
    <div id="content_<?php echo $componentGlobalName;?>">
	Panel's initial options:
        <ol id="list_<?php echo $componentGlobalName; ?>" class="selectable">
            <li class="ui-state-default">1</li>
            <li class="ui-state-default">2</li>
            <li class="ui-state-default">3</li>
            <li class="ui-state-default">4</li>
            <li class="ui-state-default">5</li>
            <li class="ui-state-default">6</li>
            <li class="ui-state-default">7</li>
            <li class="ui-state-default">8</li>
            <li class="ui-state-default">9</li>
            <li class="ui-state-default">10</li>
            <li class="ui-state-default">11</li>
            <li class="ui-state-default">12</li>
        </ol>
        <div class="wacFormClear"></div>
        <hr style="width:100%; float:inherit;" class="wacFormRuler">
        <div align="right">
            <button id="btnAdd_<?php echo $componentGlobalName; ?>"><?php echo __("add")?></button>
            <button id="btnDel_<?php echo $componentGlobalName; ?>"><?php echo __("del")?></button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });

    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;
        this.prototype      = new WacNavPanelPrototype();  // extends WacPanelPrototype

        this.moduleName        = <?php echo "'{$moduleName}'" ?>;
        this.moduleGlobalName  = <?php echo "'{$moduleGlobalName}'" ?>;
        this.componentGlobalName = "<?php echo $componentGlobalName; ?>";
        this.componentGlobalId = "<?php echo $componentGlobalId; ?>";
        this.panelId = "#content_" + <?php echo "'{$componentGlobalName}'" ?>;

        this.init = function(){
            _self.prototype.init(_self);
        };

        this.initLayout = function(){
            $("#list_" + _self.componentGlobalName).selectable();
            $('#btnAdd_' + _self.componentGlobalName).button({text: false,icons: {primary: "ui-icon-plusthick"}});
            $('#btnDel_' + _self.componentGlobalName).button({text: false,icons: {primary: "ui-icon-minusthick"}});
            _self.prototype.initLayout(_self);
        };

        this.bindEvents = function(){
            _self.prototype.bindEvents(_self);
        };

        this.initData = function(){
            _self.prototype.initData(_self);
        };

        this.initDataCallBack = function(jsonData){
            _self.prototype.initDataCallBack(_self, jsonData);
        };

        this.init();  // init method
    }
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>