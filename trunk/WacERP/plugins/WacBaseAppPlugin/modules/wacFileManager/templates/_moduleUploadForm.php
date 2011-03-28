<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName = $contextInfo['moduleName'];
$moduleAttachName = $invokeParams['attachInfo']['name'];
$modulePrefixName = $contextInfo['moduleName'] . $invokeParams['attachInfo']['name'];
$moduleCaption = WacModule::getInstance()->getCaption($moduleName);
$moduleFormDialogName = WacModuleHelper::getFormDialogId($moduleName, $moduleAttachName);
$moduleFormName = WacModuleHelper::getFormId($moduleName, $moduleAttachName);
$cfgDialogDisplay = (isset($invokeParams['config']['isHidden']) && $invokeParams['config']['isHidden']) ? "display: none;" : "display: inline;";
//print_r($contextInfo);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleFormName, true); ?>
<div id="<?php echo $moduleFormDialogName; ?>" style="<?php echo $cfgDialogDisplay;?>">
    <form name="<?php echo $moduleFormName; ?>" id="<?php echo $moduleFormName; ?>" method="post" action="">
        <div id="<?php echo $modulePrefixName; ?>_uploader">
            <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
        </div>
    </form>
</div>

<script type="text/javascript">
    //<![CDATA[
    $("#<?php echo $moduleFormDialogName; ?>").ready(function(){
        var wacImagesPath    = <?php echo "'" . sfConfig::get("app_wac_setting_images_path") . "'" ?>;

        var moduleName       = <?php echo "'{$moduleName}'" ?>;
        var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
        var modulePrefixId   = '#' + modulePrefixName;
        var moduleUploaderId = modulePrefixId + "_uploader";
        var moduleFormDialogName = <?php echo "'{$moduleFormDialogName}'" ?>;
        var moduleFormDialogId = '#' + moduleFormDialogName;
        var moduleCaption    = <?php echo "'{$moduleCaption}'" ?>;
        var moduleUrl        = WacAppConfig.baseUrl + moduleName + "/";

        var moduleUploader;   // uploader obj, created when initUploadForm

        function init(){
            initUploadForm();
            initDialog();
            bindEvents();
        };  // init end

        function initUploadForm(){
//                $(function() {
            // Convert divs to queue widgets when the DOM is ready
               $(moduleUploaderId).plupload({
                    // General settings
//                    runtimes : 'flash',
                    runtimes : 'flash,html4,html5,browserplus,silverlight,gears',
                    url : moduleUrl + 'upload',
                    max_file_size : '1000mb',
                    max_file_count: 20, // user can add no more then 20 files at a time
                    chunk_size : '2mb',
                    unique_names : true,
                    multiple_queues : true,
                    multipart_params: {dataFormat: '<?php echo WacDataFormatType::$jsonRPC; ?>', type: '<?php echo JsTreeDataHelper::$typeLeaf; ?>'},

                    // Resize images on clientside if we can
                    resize : {width : 320, height : 240, quality : 90},

                    // Rename files by clicking on their titles
                    rename: true,

                    // Sort files
                    sortable: true,

                    // Specify what files to browse for
                    filters : [
                        {title : "Image files", extensions : "jpg,gif,png"},
                        {title : "Zip files", extensions : "zip,avi"}
                    ],

                    // Flash settings
                    flash_swf_url : WacAppConfig.app_wac_setting_js_path + '/jquery/plugins/plupload/plupload.flash.swf',

                    // Silverlight settings
                    silverlight_xap_url : WacAppConfig.app_wac_setting_js_path + '/jquery/plugins/plupload/plupload.silverlight.xap'
                });

                moduleUploader = $(moduleUploaderId).plupload('getUploader');

        };  // initUploadForm end

        function initDialog(){
            $(moduleFormDialogId).dialog({
                bgiframe: true,
                modal: true,
                width: 860,
                height: 400,
                autoOpen: false,
                buttons: {},
                zIndex: 100
            });
        };

        function bindEvents()
        {
//            moduleUploader.bind('UploadFile', function(up, file) {
//                Wac.log("UploadFile");
//                Wac.log("length: " + $(moduleUploader.files).length);
//                Wac.log(up.settings.multipart_params);
//            });

//            moduleUploader.bind('UploadComplete', function(/up, files) {
//                Wac.log("UploadComplete");
//                Wac.log(up.settings.multipart_params);
////                $.shout(modulePrefixId + WacAppConfig.event.app_wac_events_file_upload_complete, moduleUploader.settings.multipart_params);
//            });

            $(document).hear(moduleFormDialogId, modulePrefixId + WacAppConfig.event.app_wac_events_show_file_upload_form, function ($self, data) {  // listenerid, event name, callback
                $.extend(moduleUploader.settings.multipart_params, { id : data.id });
//                Wac.log($(moduleUploader.files).length);
//                if($(moduleUploader.files).length > 0){
//                    $(moduleUploader.files).each(function(i, file){
//                        moduleUploader.removeFile(file);
//                    })
//                }
                $(moduleFormDialogId).dialog('open');
            });

            $( moduleFormDialogId).bind( "dialogclose", function(event, ui) {
                $.shout(modulePrefixId + WacAppConfig.event.app_wac_events_file_upload_complete, moduleUploader.settings.multipart_params);
            });

            // fix dialog div didnt remove bug, remove it by this way
            var uiPanelId = WacEntity.module.getUiPanelId(moduleName);
            $("#wacAppSystemController").unbind('tabsremove');
            $("#wacAppSystemController").bind('tabsremove', function(event, ui) {
//               Wac.log("ui.panel.id:" + ui.panel.id + " : " + uiPanelId);
                if(ui.panel.id == uiPanelId)
                {
                    $(moduleFormDialogId).remove();  //remove dialog form
                }
            });
        };  //bindEvnts end

        init();

    })
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleFormName, false); ?>