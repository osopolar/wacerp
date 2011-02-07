<?php
$moduleName = $contextInfo['moduleName'];
$componentName = $contextInfo['componentName'];
$widgetName = "{$moduleName}_{$componentName}";

OutputHelper::getInstance()->writeNote("{$moduleName}-{$componentName}, begin");
echo "<div id=\"{$widgetName}\" style=\"display: none;\">\n";

include_partial("wacPrint/tableTplA",
        array(
            'invokeParams'=>array(
                               'contextInfo' => $contextInfo
                            )
            ));

include_partial("wacPrint/printToolBar",
        array(
            'invokeParams'=>array(
                               'contextInfo' => $contextInfo
                            )
            ));

//print_r($contextInfo);
//echo "  <h2>Here's a sample of an element to print!</h2>\n";

echo "</div>\n";

//print_r($contextInfo);
?>

<script type="text/javascript">
    $(function(){
        var moduleName = <?php echo "'{$moduleName}'" ?>;
        var moduleId   = '#' + moduleName;
        var widgetName = <?php echo "'{$widgetName}'" ?>;
        var widgetId   = '#' + widgetName;
        var params = {};
        
        init();
        bindEvents();

        function init(){
            //            Wac.log("dataExportWidget init");
            $(moduleId + '_btnPrint').button({text: true, icons: {primary: "ui-icon-print"}});
            $(moduleId + '_btnClose').button({text: true, icons: {primary: "ui-icon-cancel"}});
            $(moduleId+'_toolbar').buttonset();            
        }

        function bindEvents(){
            $(moduleId + "_btnPrint").bind("click", function(){
                $(moduleId + "_content").printElement(
                    {
                        pageTitle: params.moduleCaption
                        ,
                        printMode:'popup',
                        overrideElementCSS:[
                        'main.css',
                        { href: WacAppConfig.baseUrl + 'WacBaseAppPlugin/css/wac/main.css', media:'print'}]
                    }
                );
            });

            $(moduleId + "_btnClose").bind("click", function(){
                $(document).wacPage().hideBlockUI();
                $(moduleId + "_content").html("");
            });

            $(document).hear("#wacAppController", WacAppConfig.event.app_wac_events_show_data_print_form, function ($self, data) {  // listenerid, event name, callback
//                Wac.log(data);
                params = data;

                $(document).wacPage().showBlockUI(widgetId);
                loadPrintData(params);
            });
        }

        function loadPrintData(params){
            var submitUrl = WacAppConfig.baseUrl + params.moduleName + "/" + params.moduleAction;
            var submitParams = $.extend({dataFormat: "htmlTable"}, params);
//            submitUrl += "?" + $.param(submitParams);

           $(document).wacPage().showLoader(moduleId + "_content", $.i18n.prop("data loading..."));
//            $(moduleId + "_content").progressbar({value: 100});
            
            $.ajax({
                url: submitUrl,
                //        url: WacAppConfig.baseUrl + "test/ajaxTest" ,
                global: true,
                type: "get",
                data: submitParams,
                dataType: "html",
                success: function(htmlData){
                    loadPrintDataCallback(htmlData);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    Wac.log("loadPrintData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
                }
            });

        }

        function loadPrintDataCallback(htmlData){
            $(moduleId + "_content").html(htmlData);
        }

        
    })
</script>
<?php OutputHelper::getInstance()->writeNote("{$moduleName}-{$componentName}, end");?>