<?php
$moduleName = $contextInfo['moduleName'];
$componentName = $contextInfo['componentName'];
$widgetName = "{$moduleName}_{$componentName}";

OutputHelper::getInstance()->writeNote("{$moduleName}-{$componentName}, begin");
echo "<div id=\"{$widgetName}\" style=\"display: none;\">>\n";
include_partial("wacPrint/printToolBar",
        array(
            'invokeParams'=>array(
                               'contextInfo' => $contextInfo
                            )
            ));
echo "  <h2>Here's a sample of an element to print!</h2>\n";

// module buttons bar
//include_component($invokeParams['pModule'], $invokeParams['pAction'],
//        array('invokeParams' => $invokeParams)
//);

echo "</div>\n";

//print_r($contextInfo);
?>

<script type="text/javascript">
    $(function(){
        var widgetName = <?php echo "'{$widgetName}'" ?>;
        var widgetId= '#' + widgetName;
        var params = {};
        
        init();
        bindEvents();

        function init(){
            //            Wac.log("dataExportWidget init");
            //            var btnSubmit = $(widgetId + '_submit').button({text: true,icons: {primary: "ui-icon-check"}});
        }

        function bindEvents(){
            $(document).hear("#wacAppController", WacAppConfig.event.app_wac_events_show_data_print_form, function ($self, data) {  // listenerid, event name, callback
                Wac.log(data);
//               params = data;
//               $(widgetId).dialog('open');
            });
        }


        
    })
</script>
<?php OutputHelper::getInstance()->writeNote("{$moduleName}-{$componentName}, end");?>