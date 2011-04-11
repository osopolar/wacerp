<?php

$moduleName          = $invokeParams['contextInfo']['moduleName'];
$moduleGlobalName    = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName = WacModuleHelper::getElementId($moduleName, $invokeParams['attachInfo'], "toolbar");
$componentGlobalId   = "#".$componentGlobalName;

OutputHelper::getInstance()->writeNote("{$componentGlobalName}, end");
echo "<span id='{$componentGlobalName}' class='ui-widget-header ui-corner-all' style='padding: 10px 4px;'>\n";

echo "  <span><input name='code' id='searchCode_{$componentGlobalName}' class='ui-corner-all wacInputboxSearch1' type='text' size='15' value='" . __("Search Code") . "' /></span>\n";

echo "  <span id='g1_{$componentGlobalName}'>\n";
echo "	  <button id='btnSearch_{$componentGlobalName}'>" . __("Search") . "</button>\n";
if ($invokeParams['attachInfo']['uiid'] != ucfirst(WacEntityStatus::$audited)) {
    echo "  <button id='btnAdd_{$componentGlobalName}'>" . __("Add To") . "</button>\n";
}
echo "  </span>\n";

echo "  <span id='g2_{$componentGlobalName}'>\n";
echo "	  <button id='btnExportSel_{$componentGlobalName}'>" . __("Export Select") . "</button>\n";
echo "	  <button id='btnPrint_{$componentGlobalName}'>" . __("Print") . "</button>\n";
echo "  </span>\n";

echo "</span>\n";
?>

<div class="wacFormClear"></div>

<hr class="wacFormRuler" style="width:98%;"/>

<script type="text/javascript">
    $("<?php echo $componentGlobalId; ?>").ready((function(){
        var moduleGlobalName    = <?php echo "'{$moduleGlobalName}'" ?>;
        var componentGlobalName = <?php echo "'{$componentGlobalName}'" ?>;
        var componentGlobalId   = <?php echo "'{$componentGlobalId}'" ?>;
        var searchFieldId       = '#searchCode_' + componentGlobalName;

        init();
        bindEvents();
        
        function init(){
            $(searchFieldId).focus();

            // g1
            $('#btnSearch_' + componentGlobalName).button({text: true,icons: {primary: "ui-icon-search"}});
            $('#btnAdd_' + componentGlobalName).button({text: true,icons: {primary: "ui-icon-document"}});
            $('#g1_' + componentGlobalName).buttonset();

            $('#btnExportSel_' + componentGlobalName).button({text: false,icons: {primary: "ui-icon-arrowreturnthick-1-s"}});
            $('#btnPrint_' + componentGlobalName).button({text: false,icons: {primary: "ui-icon-print"}});
            $('#g2_' + componentGlobalName).buttonset();

            //            $(componentGlobalName+'_exportFormatBtns').buttonset();

        };

        function bindEvents(){
            $(searchFieldId).bind("keydown", function(e){
                if($(searchFieldId).val() == $.i18n.prop("Search Code")){
                    $(searchFieldId).attr("value", "");
                }
            });

            $(searchFieldId).bind("keyup", function(e){
                triggerSearch();
            });

            $('#btnSearch_' + componentGlobalName).bind("click", function(){
                triggerSearch();
            });

            $('#btnAdd_' + componentGlobalName).bind("click", function(){
                $.shout(moduleGlobalName + WacAppConfig.event.app_wac_events_show_add_form, {});
            });

            $('#btnPrint_' + componentGlobalName).bind("click", function(){
                $.shout(moduleGlobalName + WacAppConfig.event.app_wac_events_data_print, {});
            });
            
            $('#btnExportSel_' + componentGlobalName).bind("click", function(){
                $.shout(moduleGlobalName + WacAppConfig.event.app_wac_events_data_export,{});
            });
        };
        

        function triggerSearch(){            
//            Wac.log(moduleGlobalName + WacAppConfig.event.app_wac_events_search_in_list + $(searchFieldId).val());
            $.shout(moduleGlobalName + WacAppConfig.event.app_wac_events_search_in_list,
            {
                searchField: "code",
                searchString: $(searchFieldId).val(),
                searchOper: "cn"     // it can be "eq,ne,lt,le,gt,ge,bw,ew,en,bn,in,cn,ni,nc"
            });
        };
    }));
</script>
<?php OutputHelper::getInstance()->writeNote("{$componentGlobalName}, end");?>