<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName              = $contextInfo['moduleName'];
$moduleGlobalName        = $moduleName.$invokeParams['attachInfo']['uiid'];
$componentGlobalName     = WacModuleHelper::getUploadFormId($moduleName, $invokeParams['attachInfo']);
$componentGlobalId       = "#".$componentGlobalName;
$componentCaption        = WacModule::getInstance()->getCaption($moduleName);
$componentFormDialogName = WacModuleHelper::getFormDialogId($moduleName, $invokeParams['attachInfo']);
$componentFormName       = WacModuleHelper::getFormId($moduleName, $invokeParams['attachInfo']);
$componentUploaderName   = WacModuleHelper::getElementId($moduleName, $invokeParams['attachInfo'], 'uploader');
$componentUploaderId     = "#".$componentUploaderName;
$cfgDialogDisplay        = (isset($invokeParams['config']['isHidden']) && $invokeParams['config']['isHidden']) ? "display: none;" : "display: inline;";
//print_r($contextInfo);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentFormName, true); ?>
<div id="<?php echo $componentFormDialogName; ?>" style="<?php echo $cfgDialogDisplay;?>">
    <form name="<?php echo $componentFormName; ?>" id="<?php echo $componentFormName; ?>" method="post" action="">
        <div id="<?php echo $componentUploaderName; ?>">
            <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
        </div>
    </form>
</div>

<script type="text/javascript">
    //<![CDATA[
    $("#<?php echo $componentFormDialogName; ?>").ready(function(){
        var wacImagesPath       = <?php echo "'" . sfConfig::get("app_wac_setting_images_path") . "'" ?>;

        var moduleName          = <?php echo "'{$moduleName}'" ?>;
        var moduleUrl           = WacAppConfig.baseUrl + moduleName + "/";
        var moduleGlobalName    = <?php echo "'{$moduleGlobalName}'" ?>;
        var componentGlobalName = <?php echo "'{$componentGlobalName}'" ?>;
        var componentGlobalId   = <?php echo "'{$componentGlobalId}'" ?>;
        var componentFormDialogId  = '#' + <?php echo "'{$componentFormDialogName}'" ?>;
        var componentUploaderId = <?php echo "'{$componentUploaderId}'" ?>;
        var componentCaption    = <?php echo "'{$componentCaption}'" ?>;

        var componentUploader;   // uploader obj, created when initUploadForm

        function init(){
            initUploadForm();
            initDialog();
            bindEvents();
        };  // init end

        function initUploadForm(){
//                $(function() {
            // Convert divs to queue widgets when the DOM is ready
               $(componentUploaderId).plupload({
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

                componentUploader = $(componentUploaderId).plupload('getUploader');

        };  // initUploadForm end

        function initDialog(){
            $(componentFormDialogId).dialog({
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
//            componentUploader.bind('UploadFile', function(up, file) {
//                Wac.log("UploadFile");
//                Wac.log("length: " + $(componentUploader.files).length);
//                Wac.log(up.settings.multipart_params);
//            });

//            componentUploader.bind('UploadComplete', function(/up, files) {
//                Wac.log("UploadComplete");
//                Wac.log(up.settings.multipart_params);
////                $.shout(modulePrefixId + WacAppConfig.event.app_wac_events_file_upload_complete, componentUploader.settings.multipart_params);
//            });

            $(document).hear(componentFormDialogId, moduleGlobalName + WacAppConfig.event.app_wac_events_show_file_upload_form, function ($self, data) {  // listenerid, event name, callback
                $.extend(componentUploader.settings.multipart_params, { id : data.id });
//                Wac.log($(componentUploader.files).length);
//                if($(componentUploader.files).length > 0){
//                    $(componentUploader.files).each(function(i, file){
//                        componentUploader.removeFile(file);
//                    })
//                }
                $(componentFormDialogId).dialog('open');
            });

            $( componentFormDialogId).bind( "dialogclose", function(event, ui) {
                $.shout(moduleGlobalName + WacAppConfig.event.app_wac_events_file_upload_complete, componentUploader.settings.multipart_params);
            });

            // fix dialog div didnt remove bug, remove it by this way
            var uiPanelId = WacEntity.module.getUiPanelId(moduleName);
            $("#wacAppSystemController").unbind('tabsremove');
            $("#wacAppSystemController").bind('tabsremove', function(event, ui) {
//               Wac.log("ui.panel.id:" + ui.panel.id + " : " + uiPanelId);
                if(ui.panel.id == uiPanelId)
                {
                    $(componentFormDialogId).remove();  //remove dialog form
                }
            });
        };  //bindEvnts end

        init();

    })
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentFormName, false); ?>