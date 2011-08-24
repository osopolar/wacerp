<?php
$moduleName           = $contextInfo['moduleName'];
$moduleGlobalName     = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName  = WacModuleHelper::getManagementPanelId($moduleName, $invokeParams['attachInfo']);
$componentGlobalId    = "#".$componentGlobalName;

?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, true); ?>
<div id="accordion_<?php echo $componentGlobalName; ?>">
    <h3><a href="#"><?php echo __("Display") . __("Setting"); ?></a></h3>
    <div>
        <form name="display_<?php echo $componentGlobalName; ?>" id="display_<?php echo $componentGlobalName; ?>" method="post" action="" class="wacFormA">
            <div class="wacFormFirstCol">
                <div class="wacFormRow">
                    <div class="wacFormItemLeft "><?php echo __("Items Per Page on List"); ?></div>
                    <div class="wacFormItemRight">
                        <input name="setting[display][rowNum]" id="rowNum_display_<?php echo $componentGlobalName; ?>" value="<?php echo $settingParams["setting/display/rowNum"]; ?>" type="text" class="validate[required,custom[onlyNumber]] wacFormText DataTD ui-widget-content ui-corner-all" />
                    </div>
                    <div class="wacFormClear"></div>
                </div>
            </div>
            <div class="wacFormSecondCol">
            </div>

            <span class="wacPanelBottom" id="groupFunc_display_<?php echo $componentGlobalName ?>">
                <input name="btnSave" id="btnSave_display_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Save"); ?>"/>
                <input name="btnReset" id="btnReset_display_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Reset"); ?>"/>
            </span>
        </form>
    </div>
    <h3><a href="#"><?php echo __("System") . __("Setting"); ?></a></h3>
    <div>
        <form name="system_<?php echo $componentGlobalName; ?>" id="system_<?php echo $componentGlobalName; ?>" method="post" action="" class="wacFormA">
            <div class="wacFormFirstCol">
                <div class="wacFormRow">
                    <div class="wacFormItemLeft "><?php echo __("Currency"); ?></div>
                    <div class="wacFormItemRight">
                        <input name="setting[system][currency]" id="currency_system_<?php echo $componentGlobalName; ?>" value="<?php echo $settingParams["setting/system/currency"]; ?>" type="text" class="validate[required] wacFormText DataTD ui-widget-content ui-corner-all" />
                    </div>
                    <div class="wacFormClear"></div>
                </div>
            </div>
            <div class="wacFormSecondCol">
            </div>

            <span class="wacPanelBottom" id="groupFunc_system_<?php echo $componentGlobalName ?>">
                <input name="btnSave" id="btnSave_system_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Save"); ?>"/>
                <input name="btnReset" id="btnReset_system_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Reset"); ?>"/>
            </span>
        </form>
    </div>
    <h3><a href="#"><?php echo __("Print") . __("Setting"); ?></a></h3>
    <div>
        <form name="print_<?php echo $componentGlobalName; ?>" id="print_<?php echo $componentGlobalName; ?>" method="post" action="" class="wacFormA">
            <div class="wacFormFirstCol">
                <div class="wacFormRow">
                    <div class="wacFormItemLeft "><?php echo __("Company").__("Name"); ?></div>
                    <div class="wacFormItemRight">
                        <input name="setting[print][companyName]" id="companyName_print_<?php echo $componentGlobalName; ?>" value="<?php echo $settingParams["setting/print/companyName"]; ?>" type="text" class="validate[required] wacFormText DataTD ui-widget-content ui-corner-all" />
                    </div>
                    <div class="wacFormClear"></div>
                </div>
            </div>
            <div class="wacFormSecondCol">
            </div>

            <span class="wacPanelBottom" id="groupFunc_print_<?php echo $componentGlobalName ?>">
                <input name="btnSave" id="btnSave_print_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Save"); ?>"/>
                <input name="btnReset" id="btnReset_print_<?php echo $componentGlobalName ?>" type="button" value="<?php echo __("Reset"); ?>"/>
            </span>
        </form>
    </div>
</div>

<script type="text/javascript">
    //<![CDATA[
    /*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

    /***** init section, begin *****/
    $("<?php echo $componentGlobalId; ?>").ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });


    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;
        var debug = true;
    //    var debug = false;


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
//            $('#groupFunc_' + _self.componentGlobalName).buttonset();
            $('span[id*=groupFunc]').buttonset();

            $( "#accordion_" + _self.componentGlobalName ).accordion({
		  icons: {header: "ui-icon-circle-arrow-e",headerSelected: "ui-icon-circle-arrow-s"}
            });
        }

        this.initData = function(){};

        this.bindEvents = function(){
            $("#btnSave_display_" + _self.componentGlobalName).bind("click", function(){
                _self.saveForm("display");
            });

            $("#btnReset_display_" + _self.componentGlobalName).bind("click", function(){
                $("#display_" + _self.componentGlobalName)[0].reset();
            });

            $("#btnSave_system_" + _self.componentGlobalName).bind("click", function(){
                _self.saveForm("system");
            });

            $("#btnReset_system_" + _self.componentGlobalName).bind("click", function(){
                $("#system_" + _self.componentGlobalName)[0].reset();
            });

            $("#btnSave_print_" + _self.componentGlobalName).bind("click", function(){
                _self.saveForm("print");
            });

            $("#btnReset_print_" + _self.componentGlobalName).bind("click", function(){
                $("#print_" + _self.componentGlobalName)[0].reset();
            });
        };

        this.validateForm = function(formId){
            Wac.log("validateForm", debug);

            var validateFlag = true;
            if (!$(formId).validationEngine({returnIsValid:true}))
            {
                validateFlag = false;
            }
            return validateFlag;
        };

        this.saveForm = function(dstForm){
            Wac.log("saveForm", debug);

            var extraParams = "dataFormat=json";
            var submitUrl;
            var formId = "#" + dstForm + "_" + _self.componentGlobalName;

            if(!_self.validateForm(formId)){
                return;
            }

            $(document).wacPage().showBlockUILoading(_self.componentGlobalId, $.i18n.prop('processing...'));
            submitUrl = WacAppConfig.baseUrl + _self.moduleName + "/edit";

            $.ajax({
                url: submitUrl,
//                url: WacAppConfig.baseUrl + "test/ajaxTest" ,
                global: true,
                type: "GET",
                data: $(formId).serialize() + "&" + extraParams,
                dataType: "json",
                success: function(jsonData){
                    _self.saveFormCallback(jsonData);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    $(document).wacTool().dumpObj(this); // the options for this ajax request
                }
            });
        };

        this.saveFormCallback = function(jsonData){
            Wac.log("saveFormCallback", debug);

            if(jsonData.info.status == WacEntity.operationStatus.Error){
                $(document).wacPage().showTips(jsonData.info.message);
            }
            else{
                $(document).wacPage().showTips(jsonData.info.message);
            }

            $(document).wacPage().hideBlockUI(_self.componentGlobalId);
        };

        this.init();  // init method

    }

     /**************  interaction section, end  ***************/
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>