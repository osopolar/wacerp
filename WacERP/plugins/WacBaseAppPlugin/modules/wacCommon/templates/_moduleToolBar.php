<div class="wacFormRow">
    <div class="wacFormItemLeft" style="width:80%">
        <?php
        echo "<span id='toolbar' class='ui-widget-header ui-corner-all' style='padding: 10px 4px;'>";

        $inputStr = "";
        $inputStr.="<input name='code' id='{$invokeParams['contextInfo']['moduleName']}{$invokeParams['attachInfo']['name']}_search_code' class='ui-corner-all wacInputboxSearch1' type='text' size='15' value='".__("Search Number")."' ";
        $inputStr.="onkeydown='javascript: if(this.value==\"".__("Search Number")."\"){this.value=\"\";} else{wacTriggerSearch(event, \"" . WacModuleHelper::getListId($invokeParams['contextInfo']['moduleName'], $invokeParams['attachInfo']['name']) . "\", \"code\");}'/>\n";
        echo $inputStr;

        echo "	<button id='{$invokeParams['contextInfo']['moduleName']}{$invokeParams['attachInfo']['name']}_btnSearch'>".__("Search")."</button>";

        if ($invokeParams['attachInfo']['name'] != ucfirst(WacEntityStatus::$audited)) {
            echo "<button id='{$invokeParams['contextInfo']['moduleName']}{$invokeParams['attachInfo']['name']}_btnAdd'>".__("Add To")."</button>";
        }
        echo "</span>";
        ?>

    </div>
    <div class="wacFormClear"></div>
</div>
<hr class="wacFormRuler" style="width:98%;"/>

<script type="text/javascript">
    $(function(){
        var prefixName = <?php echo "'{$invokeParams['contextInfo']['moduleName']}{$invokeParams['attachInfo']['name']}'" ?>;
        var prefixId= '#' + prefixName;

        $(prefixId + '_search_code').focus();

        $(prefixId + '_btnSearch').button({
            text: true,
            icons: {
                primary: "ui-icon-search"
            }
        })
        .click(function(){
            $.shout(prefixId + '<?php echo sfConfig::get("app_wac_events_search_in_list"); ?>',
              {
                  searchField: "code",
                  searchValue: $(prefixId + '_search_code').val()
              }
            );
        });
        
        $(prefixId + '_btnAdd').button({
            text: true,
            icons: {
                primary: "ui-icon-document"
            }
        })
        .click(function(){
            $.shout(prefixId + '<?php echo sfConfig::get("app_wac_events_show_add_form"); ?>', {});
        });
        
//        $(document).wacPage().initUIBtn();
    });
</script>