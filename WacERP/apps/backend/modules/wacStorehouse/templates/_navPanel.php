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
            <li class="ui-state-default">1</li>
            <li class="ui-state-default">2</li>
            <li class="ui-state-default">3</li>
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
            $('#btnAdd_' + _self.componentGlobalName).button({text: false,icons: {primary: "ui-icon-plusthick"}});
            $('#btnDel_' + _self.componentGlobalName).button({text: false,icons: {primary: "ui-icon-minusthick"}});
            _self.prototype.initLayout(_self);
        };

        this.bindEvents = function(){
            _self.prototype.bindEvents(_self);
        };

        this.initData = function(){
            $('#list_' + this.componentGlobalName).empty();
            _self.prototype.initData(_self);
        };

        this.initDataCallBack = function(jsonData){
            if(jsonData.userdata.status == WacEntity.operationStatus.succss)
            {
                if(jsonData['items'].length>0){
                    for(i=0;i<jsonData['items'].length;i++)
                    {
                        $('<li class="ui-state-default">' + jsonData['items'][i].name +'</li>').appendTo('#list_' + _self.componentGlobalName);
                    }

                    $("#list_" + _self.componentGlobalName).selectable({
                        stop: function() {
                            var result = [];
                            $( ".ui-selected", this ).each(function() {
                                var index = $("#list_"+_self.componentGlobalName+" li").index( this );
                                result.push(jsonData['items'][index]);
                            });

                            $("body").data(_self.moduleName + "/selectedItem", result[0]);
                            $.shout(WacAppConfig.event.app_wac_events_show_edit_form, {moduleName: _self.moduleName, selectedItems:result});
                        }
                    });
                }
                else{
                    $('<li class="ui-state-default">' + $.i18n.prop('no options') +'</li>').appendTo('#list_' + _self.componentGlobalName);
                }
                
            }
            else
            {
                $(document).wacPage().showTips(jsonData.userdata.message);
            }
            _self.prototype.initDataCallBack(_self, jsonData);
        };

        this.init();  // init method
    }
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentGlobalName, false); ?>