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
//$componentFormDialogName = WacModuleHelper::getFormDialogId($moduleName, $invokeParams['attachInfo']);
$componentFormName       = WacModuleHelper::getFormId($moduleName, $invokeParams['attachInfo']);
$componentFormId         = "#".$componentFormName;
$componentUploaderName   = WacModuleHelper::getElementId($moduleName, $invokeParams['attachInfo'], 'uploader');
$componentUploaderId     = "#".$componentUploaderName;
$cfgDialogDisplay        = (isset($invokeParams['config']['isHidden']) && $invokeParams['config']['isHidden']) ? "display: none;" : "display: inline;";
//print_r($contextInfo);
?>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentFormName, true); ?>
<div id="<?php echo $componentGlobalName; ?>" style="<?php echo $cfgDialogDisplay;?>">
    <form name="<?php echo $componentFormName; ?>" id="<?php echo $componentFormName; ?>" method="post" action="">
        <div id="<?php echo $componentUploaderName; ?>">
            <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
        </div>
    </form>
</div>

<script type="text/javascript">
    //<![CDATA[
    /*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 7/22/2011 4:10:45 PM  *****/

    /***** init section, begin *****/
    $("<?php echo $componentGlobalId; ?>").ready(function(){
        var <?php echo $componentGlobalName; ?> = new <?php echo ucfirst($componentGlobalName); ?>();
    });
    
    function <?php echo ucfirst($componentGlobalName); ?>(){
        var _self           = this;

        this.appControllerId   = "wacAppController";  // be used to listen tab-remove event of the controller
        this.moduleName        = <?php echo "'{$moduleName}'" ?>;
        this.moduleUrl         = WacAppConfig.baseUrl + this.moduleName + "/";
        this.moduleGlobalName  = <?php echo "'{$moduleGlobalName}'" ?>;
        this.componentGlobalName = "<?php echo $componentGlobalName; ?>";
        this.componentGlobalId = "<?php echo $componentGlobalId; ?>";
        this.uiPanelId         = WacEntity.module.getUiPanelId(this.moduleName);  // to fix the bug that cannot remove dialog in tab panel when close tab, so need to point out the panel ui id here

        this.formName       = "<?php echo $componentFormName; ?>";
        this.formId         = "<?php echo $componentFormId; ?>";

        this.componentUploader = null;   // uploader obj, created when initUploadForm
        this.componentUploaderId = <?php echo "'{$componentUploaderId}'" ?>;
        this.componentCaption    = <?php echo "'{$componentCaption}'" ?>;

        this.init = function(){
            _self.initUploadForm();
            _self.initDialog();
            _self.bindEvents();
        };  // init end

        this.initUploadForm = function(){
//                $(function() {
            // Convert divs to queue widgets when the DOM is ready
               $(_self.componentUploaderId).plupload({
                    // General settings
                    runtimes : 'flash,html4,html5,browserplus,silverlight,gears',
                    url : _self.moduleUrl + 'upload',
                    max_file_size : '1000mb',
                    max_file_count: 20, // user can add no more then 20 files at a time
                    chunk_size : '1mb',
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
                    flash_swf_url : WacAppConfig.app_wac_setting_js_path + 'jquery/plugins/plupload/plupload.flash.swf',

                    // Silverlight settings
                    silverlight_xap_url : WacAppConfig.app_wac_setting_js_path + 'jquery/plugins/plupload/plupload.silverlight.xap'
                });

                _self.componentUploader = $(_self.componentUploaderId).plupload('getUploader');

        };  // initUploadForm end

        this.initDialog = function(){
            $(_self.componentGlobalId).dialog({
                bgiframe: true,
                modal: true,
                width: 860,
                height: 400,
                autoOpen: false,
                buttons: {},
                zIndex: 100
            });
        };

        this.bindEvents = function(){
//            _self.componentUploader.bind('UploadFile', function(up, file) {
//                Wac.log("UploadFile");
//                Wac.log("length: " + $(_self.componentUploader.files).length);
//                Wac.log(up.settings.multipart_params);
//            });

//            _self.componentUploader.bind('UploadComplete', function(/up, files) {
//                Wac.log("UploadComplete");
//                Wac.log(up.settings.multipart_params);
////                $.shout(modulePrefixId + WacAppConfig.event.app_wac_events_file_upload_complete, _self.componentUploader.settings.multipart_params);
//            });

            $(document).hear(_self.componentGlobalId, _self.moduleGlobalName + WacAppConfig.event.app_wac_events_show_file_upload_form, function ($self, data) {  // listenerid, event name, callback
                $.extend(_self.componentUploader.settings.multipart_params, { parent_id : data.id });
                $(_self.componentGlobalId).dialog('open');
            });

            $( _self.componentGlobalId).bind( "dialogclose", function(event, ui) {
                $.shout(_self.moduleGlobalName + WacAppConfig.event.app_wac_events_file_upload_complete, _self.componentUploader.settings.multipart_params);
            });

            // fix dialog div didnt remove bug, remove it by this way
            $("#wacAppSystemController").unbind('tabsremove');
            $("#wacAppSystemController").bind('tabsremove', function(event, ui) {
                if(ui.panel.id == _self.uiPanelId)
                {
                    $(_self.componentGlobalId).remove();  //remove dialog form
                }
            });
        };  //bindEvnts end

        this.init();

    }
//]]>
</script>

<?php OutputHelper::getInstance()->noteComponent($contextInfo, $componentFormName, false); ?>