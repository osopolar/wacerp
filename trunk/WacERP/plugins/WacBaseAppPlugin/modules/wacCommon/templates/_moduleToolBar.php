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

        echo "<script type='text/javascript'>";
        echo "$('#{$invokeParams['contextInfo']['moduleName']}{$invokeParams['attachInfo']['name']}_search_code').focus()";
        echo "</script>";
        ?>

    </div>
    <div class="wacFormClear"></div>
</div>
<hr class="wacFormRuler" style="width:98%;"/>

<script type="text/javascript">
    $(function(){
        $('#<?php echo "{$invokeParams['contextInfo']['moduleName']}{$invokeParams['attachInfo']['name']}"; ?>_btnSearch').button({
            text: true,
            icons: {
                primary: "ui-icon-search"
            }
        });
        
        $('#<?php echo "{$invokeParams['contextInfo']['moduleName']}{$invokeParams['attachInfo']['name']}"; ?>_btnAdd').button({
            text: true,
            icons: {
                primary: "ui-icon-document"
            }
        })
        .click(function(){
            $.shout('<?php echo $invokeParams['contextInfo']['moduleName'].sfConfig::get("app_wac_events_show_add_form"); ?>', {});
        });
        
//        $(document).wacPage().initUIBtn();
    });
</script>