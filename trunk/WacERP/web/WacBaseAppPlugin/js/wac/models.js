/*
 *  declare global wac object varibles
 */

var wacModule          = new WacModule();
var wacOperationStatus = new WacOperationStatus();
var wacAjaxData        = new WacAjaxData();
var wacFormInputMode   = new WacFormInputMode();
var wacFormStatus      = new WacFormStatus();
//var wacModelObj        = new WacModel();
//var wacOpenTabs        = new WacOpenTabs();

/******************     wac class declaration     *******************/
/*
 *  declare wac modules model class
 */
function WacModule(){
    var _self = this;
    var _tag = "t";
    this._list = {
        wacGuardUser : {uiPanelId: _tag+"23002", moduleName:"wacGuardUser"},
        wacGuardGroup : {uiPanelId: _tag+"23003", moduleName:"wacGuardGroup"},
        wacGuardPermission : {uiPanelId: _tag+"23004", moduleName:"wacGuardPermission"}
    }

    this.getUiPanelId = function(name){
        return _self._list[name].uiPanelId;
    }
}


/*
 *  declare a form-prototype model class
 */
function WacFormPrototype()
{
    var _self = this;
    var debug = true;
//    var debug = false;

    this.init = function(children){
        children.initDialog();
        children.initForm();
        children.bindEvents();
    };
    
    this.bindEvents = function(children){
        Wac.log("WacFormPrototype bindEvents", debug);

        $(document).hear(children.formId, children.moduleName+"_show_add_form_evt", function ($self, data) {  // listenerid, event name, callback
            children.openMainForm(wacFormInputMode.add);
//            Wac.log(data);
//            Wac.log(jQuery._jq_shout.registry);
        });

        $(document).hear(children.formId, children.moduleName+"_show_edit_form_evt", function ($self, data) {  // listenerid, event name, callback
            children.openMainForm(wacFormInputMode.edit, data.id);
//            Wac.log(data);
//            Wac.log(jQuery._jq_shout.registry);
        });

        // unbind all events related to the dialog form
        $(children.formDialogId).unbind();

        $(children.formDialogId).bind('dialogopen', function(event, ui)
        {
            children.initFormData();
        });

        $(children.formDialogId).bind('dialogclose', function(event, ui)
        {
            $.validationEngine.closePrompt(".formError", true);
        });

        $(children.moduleId + "_btnSubmit").bind('click', function (e)
        {
            children.submitMainForm();
        });

        $(children.moduleId + "_btnClose").bind('click', function (e)
        {
            $(children.formDialogId).dialog('close');
        });

        // fix dialog div didnt remove bug, remove it by this way
        $(children.appControllerId).unbind('tabsremove');
        $(children.appControllerId).bind('tabsremove', function(event, ui) {
//            Wac.log("ui.panel.id:" + ui.panel.id);
            if(ui.panel.id == children.uiPanelId)
            {
//                Wac.log("div[aria-labelledby='ui-dialog-title-"+ children.formDialogName +"']");
//                Wac.log(ui.panel.id + " 1:" + $("div[aria-labelledby='ui-dialog-title-"+ children.formDialogName +"']").length);
                $("div[aria-labelledby='ui-dialog-title-"+ children.formDialogName +"']").remove();  // remove dialog div
                $("div[class='"+ children.moduleName +"_nameformError']").remove();  //remove error msg div
            }
        });
    };

    this.initDialog = function(children){
        Wac.log("WacFormPrototype initDialog", debug);

        $(children.formDialogId).dialog({
            bgiframe: true,
            modal: true,
            width: 880,
            height: 520,
            autoOpen: false,
            buttons: {},
            zIndex: 100
        });
    };

    this.initForm = function(children){
        Wac.log("WacFormPrototype initForm", debug);

        $(children.formId).validationEngine();

        $('.wacFormContent .left, .wacFormContent input, .wacFormContent textarea, .wacFormContent select').focus(function(){
            $(this).parents('.wacFormContent').addClass("wacFormOver");
        }).blur(function(){
            $(this).parents('.wacFormContent').removeClass("wacFormOver");
        });

        $('.wacFormContentA .left, .wacFormContentA input, .wacFormContentA textarea, .wacFormContentA select').focus(function(){
            $(this).parents('.wacFormRow').addClass("wacFormOver");
        }).blur(function(){
            $(this).parents('.wacFormRow').removeClass("wacFormOver");
        });
    };

    this.initFormData = function(children){
        Wac.log("WacFormPrototype initFormData", debug);

        $(document).wacPage().showBlockUILoading(children.formDialogId);

        var params ={dataFormat :'json'};
        if(children.inputMode == wacFormInputMode.edit)   // use default values
        {
            params.id = children.modelEntity.id;
        }

        $.ajax({
            url: BASE_URL + children.moduleName + "/getFormData",
            global: true,
            type: "GET",
            data: params,
            dataType: "json",
            success: function(jsonData){
                children.initFormDataCallBack(jsonData);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                Wac.log("getFormData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
            }
        });
    };

    this.initFormDataCallBack = function(children, jsonData){
        Wac.log("WacFormPrototype initFormDataCallBack", debug);

        children.setupDefaults(jsonData['items']['default']);

        $(document).wacPage().hideBlockUI(children.formDialogId);
    };

    this.setupDefaults = function(children, defaultValueObj){
        Wac.log("WacFormPrototype setupDefaults", debug);
    };

    this.openMainForm = function(children, inputMode, id){
        Wac.log("WacFormPrototype openMainForm", debug);

        children.inputMode = inputMode;

        if(id === undefined){
            children.modelEntity = {};
        }
        else
        {
            children.modelEntity = $(children.moduleId +"List").getRowData(id);
        }

        $(children.formDialogId).dialog('open');
    };

    this.validateMainForm = function(children){
        Wac.log("WacFormPrototype validateMainForm", debug);
        
        var validateFlag = true;
        if (!$(children.formId).validationEngine({returnIsValid:true}))
        {
            validateFlag = false;
        }
        return validateFlag;
    };

    this.submitMainForm = function(children){
        Wac.log("WacFormPrototype submitMainForm", debug);

        if(!children.validateMainForm()){
            return;
        }

        $(document).wacPage().showBlockUILoading(children.formDialogId, "处理中...");

        var extraParams = "dataFormat=json";
        var submitUrl;

        if(children.inputMode == wacFormInputMode.add){
            submitUrl = BASE_URL + children.moduleName + "/add";
        }
        else{
            submitUrl = BASE_URL + children.moduleName + "/edit";
        }


        $.ajax({
            url: submitUrl,
            //        url: BASE_URL + "test/ajaxTest" ,
            global: true,
            type: "GET",
            data: $(children.formId).serialize() + "&" + extraParams,
            dataType: "json",
            success: function(jsonData){
                children.submitMainFormCallBack(jsonData);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                Wac.log("getFormData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
            }
        });
    };

    this.submitMainFormCallBack = function(children, jsonData){
        Wac.log("WacFormPrototype submitMainFormCallBack", debug);

        if(jsonData.info.status == wacOperationStatus.Error)
        {
            $(document).wacPage().showTips(jsonData.info.message);
        }
        else
        {
            $(document).wacPage().showTips(jsonData.info.message);
            $(children.listId).trigger("reloadGrid");
        }

        $(document).wacPage().hideBlockUI(children.formDialogId);
    };
}


/*
 *  declare WacLayout model class
 */
WacLayout = function(options){
    var settings = null;

    var _instance = null;
    var _options = options;

    return {  // declare public methods
        init: function(){
            // create WAC Application LAYOUT
            $(_options.appId).show();
            settings = (settings == null) ? this.initSettings(_options) : settings;
            _instance = $(_options.appId).layout( settings );
            this.decorate();
            //        $(document).wacTool().dumpObj(settings);
            return _instance;
        }
        ,
        getUiLayout: function()
        {
            return _instance;
        }
        ,
        decorate: function(){
            Wac.log("layout.decorate");
        }
        ,
        hide: function(){
            $(_options.appId).hide();
        }
        ,
        initSettings: function(){
            /*
            *#######################
            * appSystemControllerLayoutSettings
            *#######################
            *
            * This configuration illustrates how extensively the layout can be customized
            * ALL SETTINGS ARE OPTIONAL - and there are more available than shown below
            *
            * These settings are set in 'sub-key format' - ALL data must be in a nested data-structures
            * All default settings (applied to all panes) go inside the defaults:{} key
            * Pane-specific settings go inside their keys: north:{}, south:{}, center:{}, etc
            */

            var defaults = {
                name: _options.appId + "Layout" // NO FUNCTIONAL USE, but could be used by custom code to 'identify' a layout
            // _options.defaults apply to ALL PANES - but overridden by pane-specific settings
            };

//            var defaults = {
//                size:                   "auto"
//                ,
//                minSize:                90
//                ,
//                paneClass:              "pane"         // default = 'ui-layout-pane'
//                ,
//                resizerClass:           "resizer"    // default = 'ui-layout-resizer'
//                ,
//                togglerClass:           "toggler"    // default = 'ui-layout-toggler'
//                ,
//                buttonClass:            "button"    // default = 'ui-layout-button'
//                ,
//                contentSelector:        ".content"    // inner div to auto-size so only it scrolls, not the entire pane!
//                ,
//                contentIgnoreSelector:  "span"        // 'paneSelector' for content to 'ignore' when measuring room for content
//                ,
//                togglerLength_open:     35            // WIDTH of toggler on north/south edges - HEIGHT on east/west edges
//                ,
//                togglerLength_closed:   35            // "100%" OR -1 = full height
//                ,
//                hideTogglerOnSlide:     true        // hide the toggler when pane is 'slid open'
//                ,
//                togglerTip_open:        "Close This Pane"
//                ,
//                togglerTip_closed:      "Open This Pane"
//                ,
//                resizerTip:             "Resize This Pane"
//                //    effect defaults - overridden on some panes
//                ,
//                fxName:                 "slide"        // none, slide, drop, scale
//                ,
//                fxSpeed_open:           750
//                ,
//                fxSpeed_close:          1500
//                ,
//                fxSettings_open:        {
//                    easing: "easeInQuint"
//                }
//                ,
//                fxSettings_close:        {
//                    easing: "easeOutQuint"
//                }
//            }

            return $.extend({}, defaults, _options.settings);

        }
    }
}


/*
 *  declare wac ajax action implemention status
 */
function WacOperationStatus()
{
    this.Succss = "0000";
    this.Error  = "0001";
    this.Processing  = false;
}

/*
 *  declare wac ajax action implemention status
 */
function WacFormStatus()
{
    this.notsave     = "0";
    this.init        = "1";
    this.Processing  = "2";
    this.audited     = "3";
    this.finish      = "100";
}

/*
 *  temporary store ajax data
 */
function WacAjaxData()
{
    this.response = {};
}

/*
 * declare open tabs related objs
 */
function WacOpenTabs()
{
    this.appStorehouseTabs = [];
    this.appSysTabs = [];
}

/*
 *  form input mode
 */
function WacFormInputMode()
{
    this.add   = 'c';
    this.read  = 'r';
    this.edit  = 'u';
    this.del   = 'd';
    this.audit = 'a';
}
