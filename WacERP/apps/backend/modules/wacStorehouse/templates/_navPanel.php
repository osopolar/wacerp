<?php
$attachInfo = array("uiid" => WacWidgetHelper::getInstance()->getUiid($contextInfo));
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$attachInfo['uiid'];
$componentGlobalName  = WacModuleHelper::getNavPanelId($moduleName, $attachInfo);
$componentGlobalId    = "#".$componentGlobalName;
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>

<div id="<?php echo $componentGlobalName;?>" class="wacNavPanel">
    <h3><?php echo __("Storehouse").__("List");?></h3>
    <div id="content_<?php echo $componentGlobalName;?>">
        <ol id="list_<?php echo $componentGlobalName; ?>" class="selectable">
        </ol>
        <div class="wacFormClear"></div>
        <div class="wacFormBottom">
            <hr style="width:100%; float:inherit;" class="wacFormRuler">
            <div class="wacFormClear"></div>
            <span id="barPager_<?php echo $componentGlobalName ?>">
                <button id="btnPrev_<?php echo $componentGlobalName; ?>"><?php echo __("Previous page")?></button>
                <span id="currentPage_<?php echo $componentGlobalName; ?>">0</span>
                /
                <span id="totalPages_<?php echo $componentGlobalName; ?>">0</span>
                <button id="btnNext_<?php echo $componentGlobalName; ?>"><?php echo __("Next page")?></button>
            </span>
            <span style="float:right">
                <button id="btnAdd_<?php echo $componentGlobalName; ?>"><?php echo __("JqGridBtnAdd")?></button>
                <button id="btnDel_<?php echo $componentGlobalName; ?>"><?php echo __("JqGridBtnDel")?></button>
            </span>
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
        this.prototype.constructor = this;

        this.moduleName        = <?php echo "'{$moduleName}'" ?>;
        this.moduleGlobalName  = <?php echo "'{$moduleGlobalName}'" ?>;
        this.componentGlobalName = "<?php echo $componentGlobalName; ?>";
        this.componentGlobalId = "<?php echo $componentGlobalId; ?>";
        this.panelId = "#content_" + <?php echo "'{$componentGlobalName}'" ?>;
        this.selectedItems = [];

        this.init = function(){
            _self.prototype.init(_self);
        };

        this.initLayout = function(){
            _self.prototype.initLayout(_self);
        };

        this.bindEvents = function(){
            _self.prototype.bindEvents(_self);
        };

        this.initData = function(){
            $('#list_' + this.componentGlobalName).empty();
            _self.prototype.initData(_self);
        };

        this.initDataCallback = function(jsonData){
            _self.prototype.initDataCallback(_self, jsonData);
        };

        this.deleteData = function(){
            _self.prototype.deleteData(_self);
        };

        this.deleteDataCallback = function(){
            _self.prototype.deleteDataCallback(_self);
        };

        this.init();  // init method
    }
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>