<?php
$modulePrefixName = $invokeParams['contextInfo']['moduleName'] . $invokeParams['attachInfo']['name'];
$moduleName = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName = $invokeParams['attachInfo']['name'];


echo "<span id='{$modulePrefixName}_toolbar' class='ui-widget-header ui-corner-all' style='padding: 10px 4px;'>\n";

echo "  <span><input name='code' id='{$modulePrefixName}_search_code' class='ui-corner-all wacInputboxSearch1' type='text' size='15' value='" . __("Search Code") . "' /></span>\n";

echo "  <span id='{$modulePrefixName}_g1'>\n";
echo "	  <button id='{$modulePrefixName}_btnSearch' class=\"{button:{icons:{primary:'ui-icon-folder-open'},text:true}}\">" . __("Search") . "</button>\n";
if ($moduleAttachName != ucfirst(WacEntityStatus::$audited)) {
  echo "  <button id='{$modulePrefixName}_btnAdd'>" . __("Add To") . "</button>\n";
}
echo "  </span>\n";

//echo "  <span id=\"{$modulePrefixName}_exportFormatBtns\">\n";
//echo "	  <input type=\"radio\" id=\"{$modulePrefixName}_btnExportFmt1\" name=\"exportFormat\" /><label for=\"{$modulePrefixName}_btnExportFmt1\">Choice 1</label>\n";
//echo "	  <input type=\"radio\" id=\"{$modulePrefixName}_btnExportFmt2\" name=\"exportFormat\" checked=\"checked\" /><label for=\"{$modulePrefixName}_btnExportFmt2\">Choice 2</label>\n";
//echo "	  <input type=\"radio\" id=\"{$modulePrefixName}_btnExportFmt3\" name=\"exportFormat\" /><label for=\"{$modulePrefixName}_btnExportFmt3\">Choice 3</label>\n";
//echo "  </span>\n";
echo "  <span id='{$modulePrefixName}_g2'>\n";
echo "	  <button id='{$modulePrefixName}_btnExportSel'>" . __("Export Select") . "</button>\n";
echo "	  <button id='{$modulePrefixName}_btnPrint'>" . __("Print") . "</button>\n";
echo "  </span>\n";

echo "</span>\n";
?>

<div class="wacFormClear"></div>

<hr class="wacFormRuler" style="width:98%;"/>

<script type="text/javascript">
    $(function(){
        var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
        var modulePrefixId= '#' + modulePrefixName;
        var searchFieldId = modulePrefixId + '_search_code';
        var toolbarId = '#' + modulePrefixName + "_toolbar";

        init();
        bindEvents();
        
        function init(){
            $(searchFieldId).focus();

            // g1
            $(modulePrefixId + '_btnSearch').button({text: true,icons: {primary: "ui-icon-search"}});
            $(modulePrefixId + '_btnAdd').button({text: true,icons: {primary: "ui-icon-document"}});
            $(modulePrefixId+'_g1').buttonset();

            $(modulePrefixId + '_btnExportSel').button({text: false,icons: {primary: "ui-icon-disk"}});
            $(modulePrefixId + '_btnPrint').button({text: false,icons: {primary: "ui-icon-print"}});
            $(modulePrefixId+'_g2').buttonset();

//            $(modulePrefixId+'_exportFormatBtns').buttonset();

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


            $(modulePrefixId + '_btnSearch').bind("click", function(){
               triggerSearch();
            })

            $(modulePrefixId + '_btnExportSel').bind("click", function(){
                $.shout('<?php echo sfConfig::get("app_wac_events_show_data_export_form"); ?>',
                    {
                        searchField: "code",
                        searchString: $(searchFieldId).val(),
                        searchOper: "cn"     // it can be "eq,ne,lt,le,gt,ge,bw,ew,en,bn,in,cn,ni,nc"
                    }
                );
            })
        };
        

        function triggerSearch(){            
//            Wac.log($(searchFieldId).val());
            $.shout(modulePrefixId + '<?php echo sfConfig::get("app_wac_events_search_in_list"); ?>',
              {
                  searchField: "code",
                  searchString: $(searchFieldId).val(),
                  searchOper: "cn"     // it can be "eq,ne,lt,le,gt,ge,bw,ew,en,bn,in,cn,ni,nc"
              }
            );
        };
    });
</script>