<?php
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName  = WacModuleHelper::getManagementPanelId($moduleName, $invokeParams['attachInfo']);
$componentGlobalId    = "#".$componentGlobalName;
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>
<div id="<?php echo $componentGlobalName; ?>" title="<?php echo WacModule::getInstance()->getCaption($moduleName); ?>" class="ui-widget centralPanel" >
    <h3><?php echo __("Material").__("Category");?></h3>
    <div>
        
    </div>
</div>

<script type="text/javascript">
    //<![CDATA[
    /*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

    /***** init section, begin *****/
    $("<?php echo $componentGlobalId; ?>").ready(function(){
//        Wac.log("<?php echo $componentGlobalId; ?> ready");
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
            Wac.log("initLayout");
        }

        this.initData = function(){};

        this.bindEvents = function(){};

        this.init();  // init method

    }

     /**************  interaction section, end  ***************/
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>