<?php
$modulePrefixName = $invokeParams['contextInfo']['moduleName'].$invokeParams['attachInfo']['name'];
$moduleName = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName = $invokeParams['attachInfo']['name'];

?>

<div class="wacFormRow">
    <div class="wacFormItemLeft" style="width:80%">
        <?php
        echo "<span id='toolbar' class='ui-widget-header ui-corner-all' style='padding: 10px 4px;'>";

        $inputStr = "";
        $inputStr.="<input name='code' id='{$modulePrefixName}_search_code' class='ui-corner-all wacInputboxSearch1' type='text' size='15' value='".__("Search Code")."' ";
        $inputStr.="/>\n";
//        $inputStr.="onkeydown='javascript: if(this.value==\"".__("Search Number")."\"){this.value=\"\";} else{wacTriggerSearch(event, \"" . WacModuleHelper::getListId($invokeParams['contextInfo']['moduleName'], $invokeParams['attachInfo']['name']) . "\", \"code\");}'/>\n";
        echo $inputStr;

        echo "	<button id='{$modulePrefixName}_btnSearch'>".__("Search")."</button>";

        if ($moduleAttachName != ucfirst(WacEntityStatus::$audited)) {
            echo "<button id='{$modulePrefixName}_btnAdd'>".__("Add To")."</button>";
        }
        echo "</span>";
        ?>

    </div>
    <div class="wacFormClear"></div>
</div>
<hr class="wacFormRuler" style="width:98%;"/>

<script type="text/javascript">
    $(function(){
        var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
        var modulePrefixId= '#' + modulePrefixName;
        var searchFieldId = modulePrefixId + '_search_code';

        $(searchFieldId).focus();

        $(searchFieldId).bind("keydown", function(e){
            if($(searchFieldId).val() == $.i18n.prop("Search Code")){
                $(searchFieldId).attr("value", "");
            }
        });

        $(searchFieldId).bind("keyup", function(e){
            triggerSearch();
        });

        $(modulePrefixId + '_btnSearch').button({
            text: true,
            icons: {
                primary: "ui-icon-search"
            }
        })
        .click(function(){
            triggerSearch();
        });
        
        $(modulePrefixId + '_btnAdd').button({
            text: true,
            icons: {
                primary: "ui-icon-document"
            }
        })
        .click(function(){
            $.shout(modulePrefixId + '<?php echo sfConfig::get("app_wac_events_show_add_form"); ?>', {});
        });

        function triggerSearch(){            
//            Wac.log($(searchFieldId).val());
            $.shout(modulePrefixId + '<?php echo sfConfig::get("app_wac_events_search_in_list"); ?>',
              {
                  searchField: "code",
                  searchString: $(searchFieldId).val(),
                  searchOper: "cn"     // it can be "eq,ne,lt,le,gt,ge,bw,ew,en,bn,in,cn,ni,nc"
              }
            );
        }
    });
</script>