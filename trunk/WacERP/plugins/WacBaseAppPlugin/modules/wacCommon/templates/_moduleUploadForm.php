<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName = $invokeParams['attachInfo']['name'];
$modulePrefixName = $invokeParams['contextInfo']['moduleName'] . $invokeParams['attachInfo']['name'];
$moduleFormId = WacModuleHelper::getFormId($moduleName, $moduleAttachName);
$moduleCaption = WacModule::getInstance()->getCaption($moduleName) . __("List");
//print_r($invokeParams['contextInfo']);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleFormId, true); ?>

<form name="<?php echo $moduleFormId; ?>" id="<?php echo $moduleFormId; ?>" method="post" action="">
    <div id="<?php echo $modulePrefixName; ?>_uploader">
        <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
    </div>
</form>

<script type="text/javascript">
    //<![CDATA[
    $("#<?php echo $moduleFormId; ?>").ready(function(){
        var wacImagesPath    = <?php echo "'" . sfConfig::get("app_wac_setting_images_path") . "'" ?>;

        var moduleName       = <?php echo "'{$moduleName}'" ?>;
        var modulePrefixName = <?php echo "'{$modulePrefixName}'" ?>;
        var modulePrefixId   = '#' + modulePrefixName;
        var moduleUploaderId = modulePrefixId + "_uploader";
        var moduleCaption    = <?php echo "'{$moduleCaption}'" ?>;
        var moduleUrl        = WacAppConfig.baseUrl + moduleName + "/";


        init();
        bindEvents();

        function init(){
            // Convert divs to queue widgets when the DOM is ready
            $(function() {
                $(moduleUploaderId).plupload({
                    // General settings
                    runtimes : 'flash,html5,browserplus,silverlight,gears,html4',
                    url : moduleUrl + 'upload?dataFormat=<?php echo WacDataFormatType::$jsonRPC?>',
                    max_file_size : '1000mb',
                    max_file_count: 20, // user can add no more then 20 files at a time
                    chunk_size : '1mb',
                    unique_names : true,
                    multiple_queues : true,

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

                // Client side form validation
                $('form').submit(function(e) {
                    var uploader = $(moduleUploaderId).plupload('getUploader');

                    // Validate number of uploaded files
                    if (uploader.total.uploaded == 0) {
                        // Files in queue upload them first
                        if (uploader.files.length > 0) {
                            // When all files are uploaded submit form
                            uploader.bind('UploadProgress', function() {
                                if (uploader.total.uploaded == uploader.files.length)
                                    $('form').submit();
                            });

                            uploader.start();
                        } else
                            alert('You must at least upload one file.');

                        e.preventDefault();
                    }
                });

            });
            
        };  // init end
         
        function bindEvents(){};  //bindEvnts end

    })
    //]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $moduleFormId, false); ?>