<?php
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName  = WacModuleHelper::getManagementPanelId($moduleName, $invokeParams['attachInfo']);
$componentGlobalId    = "#".$componentGlobalName;
$componentFormName    = WacModuleHelper::getFormId($componentGlobalName, $invokeParams['attachInfo']);
$componentFormId      = "#".$componentFormName;
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>
<div id="<?php echo $componentGlobalName; ?>" title="<?php echo WacModule::getInstance()->getCaption($moduleName); ?>" class="ui-widget centralPanel" >
    <h3><?php echo __("Options").__("Panel");?></h3>
    <div>
        <form name="<?php echo $componentFormName; ?>" id="<?php echo $componentFormName; ?>" method="post" action="" class="wacFormA">
            <div id="accordion_<?php echo $componentGlobalName; ?>">
                <h3><a href="#"><?php echo __("Display") . __("Setting"); ?></a></h3>
                <div>
                    <div class="wacFormFirstCol">
                        <div class="wacFormRow">
                            <div class="wacFormItemLeft "><?php echo __("Items Per Page on List"); ?></div>
                            <div class="wacFormItemRight">
                                <input name="setting[display][rowNum]" id="display_rowNum_<?php echo $componentGlobalName; ?>" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                            </div>
                            <div class="wacFormClear"></div>
                        </div>
                    </div>
                    <div class="wacFormSecondCol">
                    </div>

                    <span class="wacPanelBottom" id="groupFunc_<?php echo $componentGlobalName ?>">
                        <input name="btnSave" id="btnSave_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Save"); ?>"/>
                        <input name="btnDel" id="btnDel_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Delete"); ?>"/>
                        <input name="btnPrint" id="btnPrint_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Print"); ?>"/>
                    </span>

                </div>
                <h3><a href="#">Section 2</a></h3>
                <div>
                    <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
                </div>
                <h3><a href="#">Section 3</a></h3>
                <div>
                    <p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
                    <ul>
                        <li>List item one</li>
                        <li>List item two</li>
                        <li>List item three</li>
                    </ul>
                </div>
                <h3><a href="#">Section 4</a></h3>
                <div>
                    <p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                </div>
            </div>
        </form>
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
            $('#groupFunc_' + _self.componentGlobalName).buttonset();
            
            $( "#accordion_" + _self.componentGlobalName ).accordion({
		  icons: {header: "ui-icon-circle-arrow-e",headerSelected: "ui-icon-circle-arrow-s"}
            });

            $(_self.componentGlobalId).panel({
                draggable:true,
                width:'100%'
            });
        }

        this.initData = function(){};

        this.bindEvents = function(){};

        this.init();  // init method

    }

     /**************  interaction section, end  ***************/
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>