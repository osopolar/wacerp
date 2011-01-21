<?php
$moduleName = $contextInfo['moduleName'];
$componentName = $contextInfo['componentName'];
$widgetName = "{$moduleName}_{$componentName}";

echo "<div id=\"{$widgetName}\" style=\"display: none;\">\n";
echo "    <form action=\"\"  name=\"{$widgetName}_form\" id=\"{$widgetName}_form\" method=\"post\">\n";
echo "    <table width='100%'>\n";
echo "{$form }\n";
echo "        <tr>\n";
echo "            <td align='center' colspan='2'>\n";
echo "            </td>\n";
echo "        </tr>\n";
echo "    </table>\n";
echo "    </form>\n";
echo "</div>\n";

//print_r($contextInfo);
//load main js after html elements are loaded finish
//echo "<script type=\"text/javascript\" src=\"".$contextInfo["wacComponentJs"].".js\"></script>\n";
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

            $(widgetId).dialog({
                bgiframe: true,
                modal: true,
                width: 480,
                height: 260,
                autoOpen: false,
                zIndex: 100,
                buttons: [
                    {
                        text: $.i18n.prop("Submit"),
                        click: function() {
//                            Wac.log(params);
                            dataExport();
                        }
                    },
                    {
                        text: $.i18n.prop("Close"),
                        click: function() { $(this).dialog("close"); }
                    }
                ],
                open: function(){
                    $($('.ui-dialog-buttonpane button')[0]).button({
                        icons: {
                            primary: 'ui-icon-check'
                        }
                    });

                    $($('.ui-dialog-buttonpane button')[1]).button({
                        icons: {
                            primary: 'ui-icon-cancel'
                        }
                    });
                }
                
            });
        }

        function bindEvents(){
            $(document).hear("#wacAppController", WacAppConfig.event.app_wac_events_show_data_export_form, function ($self, data) {  // listenerid, event name, callback
//                Wac.log(data);
               params = data;
               $(widgetId).dialog('open');
            });
        }

        function dataExport(){
            var submitUrl = WacAppConfig.baseUrl + params.moduleName + "/dataExport";
            var submitParams = $.extend({dataFormat: $("input[name='dataExportFormat']:checked").val()}, params);
            submitUrl += "?" + $.param(submitParams);

//            Wac.log(submitUrl);
            $(document).attr("location", submitUrl + "?" )


//            $.ajax({
//                url: submitUrl,
//                //        url: WacAppConfig.baseUrl + "test/ajaxTest" ,
//                global: true,
//                type: "get",
//                data: submitParams,
//                dataType: "json",
//                success: function(jsonData){
//                    dataExportCallBack(jsonData);
//                },
//                error: function(XMLHttpRequest, textStatus, errorThrown){
//                    Wac.log("dataExport Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
//                }
//            });
        }

        function dataExportCallBack(jsonData){
        
        }

        
    })
</script>