/*
 *  declare global Wac Prototypes
 */


/******************     wac class declaration     *******************/
/*
 *  declare a form-prototype model class
 */
function WacFormPrototype()
{
    var _self = this;
//    var debug = true;
    var debug = false;

    this.init = function(children){
        children.initDialog();
        children.initForm();
        children.bindEvents();
    };
    
    this.bindEvents = function(children){
        Wac.log("WacFormPrototype bindEvents", debug);

        $(document).hear(children.formId, children.moduleGlobalName + "_show_add_form_evt", function ($self, data) {  // listenerid, event name, callback
            children.openMainForm(WacEntity.formInputMode.add);
//            Wac.log(data);
//            Wac.log(jQuery._jq_shout.registry);
        });

        $(document).hear(children.formId, children.moduleGlobalName + "_show_edit_form_evt", function ($self, data) {  // listenerid, event name, callback
            children.openMainForm(WacEntity.formInputMode.edit, data.id);
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

        $("#btnSave_" + children.componentGlobalName).bind('click', function (e)
        {
            children.submitMainForm();
        });

        $("#btnClose_" + children.componentGlobalName).bind('click', function (e)
        {
            $(children.formDialogId).dialog('close');
        });

        // fix dialog div didnt remove bug, remove it by this way
//        $(children.appControllerId).unbind('tabsremove');
        $(children.appControllerId).bind('tabsremove', function(event, ui) {
//            Wac.log("ui.panel.id:" + ui.panel.id + ":" + children.uiPanelId);
            if(ui.panel.id == children.uiPanelId)
            {
//                Wac.log("div[aria-labelledby='ui-dialog-title-"+ children.formDialogName +"']");
//                Wac.log(ui.panel.id + " 1:" + $("div[aria-labelledby='ui-dialog-title-"+ children.formDialogName +"']").length);
                $("div[aria-labelledby='ui-dialog-title-"+ children.formDialogName +"']").remove();  // remove dialog div
                $("div[class='"+ children.formDialogName +"_nameformError']").remove();  //remove error msg div
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
        $('#btnSave_'+children.componentGlobalName).button();
        $('#btnClose_'+children.componentGlobalName).button();
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

        $("input[type=text][id*='" + children.moduleName + "']").attr("value", "");
        $("textarea[id*='" + children.moduleName + "']").attr("value", "");

        var params ={dataFormat :'json'};
        if(children.inputMode == WacEntity.formInputMode.edit)   // use default values
        {
            params.id = children.modelEntity.id;
        }

        $.ajax({
            url: WacAppConfig.baseUrl + children.moduleName + "/getFormData",
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
            children.modelEntity = $(children.listId).getRowData(id);
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

        $(document).wacPage().showBlockUILoading(children.formDialogId, $.i18n.prop('processing...'));

        var extraParams = "dataFormat=json";
        var submitUrl;

        if(children.inputMode == WacEntity.formInputMode.add){
            submitUrl = WacAppConfig.baseUrl + children.moduleName + "/add";
        }
        else{
            submitUrl = WacAppConfig.baseUrl + children.moduleName + "/edit";
        }


        $.ajax({
            url: submitUrl,
            //        url: WacAppConfig.baseUrl + "test/ajaxTest" ,
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

        if(jsonData.info.status == WacEntity.operationStatus.Error)
        {
            $(document).wacPage().showTips(jsonData.info.message);
        }
        else
        {
            $(document).wacPage().showTips(jsonData.info.message);
            $(children.listId).trigger("reloadGrid");
            $(children.formDialogId).dialog('close');
        }

        $(document).wacPage().hideBlockUI(children.formDialogId);
    };
}

/*
 *  declare a panel-prototype model class
 */
function WacNavPanelPrototype()
{
    var _self = this;

    var debug = true;
//    var debug = false;

    var pagerInfo = {currentPage: 1, totalPages:1, totalRecords:0};

    this.init = function(children){
        children.initLayout();
        children.initData();
        children.bindEvents();
    };

    this.bindEvents = function(children){
        Wac.log("WacNavPanelPrototype bindEvents", debug);

        $('#btnPrev_' + children.componentGlobalName).bind("click", function(){
                _self.getList(children, pagerInfo.currentPage - 1);
            });

        $('#btnNext_' + children.componentGlobalName).bind("click", function(){
                _self.getList(children, pagerInfo.currentPage + 1);
            });

        $('#btnAdd_' + children.componentGlobalName).bind("click", function(){
                $.shout(WacAppConfig.event.app_wac_events_show_add_form, {moduleName: children.moduleName});
            });

        $('#btnDel_' + children.componentGlobalName).bind("click", function(){
            if($(children.selectedItems).length == 0){
                $(document).wacPage().showTips($.i18n.prop("Please select one item at least!"));
            }
            else{
                $(document).wacPage().showConfirm(
                                    $.i18n.prop('Delete confirm'),
                                    function(){  // if yes
                                        children.deleteData();
                                    },
                                    function(){}  // if no
                                );
//                $.shout(WacAppConfig.event.app_wac_events_show_add_form, {moduleName: children.moduleName});
            }
        });

        $(document).hear(children.componentGlobalId, children.moduleName + WacAppConfig.event.app_wac_events_data_saved, function ($self, data) {  // listenerid, event name, callback
            children.initData();
        });

        $(document).hear(children.componentGlobalId, children.moduleName + WacAppConfig.event.app_wac_events_data_deleted, function ($self, data) {  // listenerid, event name, callback
            children.deleteData();
        });
        
    };

    this.initLayout = function(children){
        Wac.log("WacNavPanelPrototype initLayout", debug);
        $('#btnPrev_' + children.componentGlobalName).button({text: false,icons: {primary: "ui-icon-circle-triangle-w"}});
        $('#btnNext_' + children.componentGlobalName).button({text: false,icons: {primary: "ui-icon-circle-triangle-e"}});
        $('#btnAdd_' + children.componentGlobalName).button({text: false,icons: {primary: "ui-icon-plusthick"}});
        $('#btnDel_' + children.componentGlobalName).button({text: false,icons: {primary: "ui-icon-minusthick"}});

        $(children.componentGlobalId).panel({
            collapseType:'slide-left',
            trueVerticalText:true,
            vHeight:'150px',
            width:'280px'
        });
    };

    this.initData = function(children){
        Wac.log("WacNavPanelPrototype initData", debug);

        // bind dataobj to UI
        $("#currentPage_" + children.componentGlobalName).link(pagerInfo, {currentPage: {name: "currentPage_" + children.componentGlobalName, convertBack: function(value, source, target) {$(target).text(value);}}});
        $("#totalPages_" + children.componentGlobalName).link(pagerInfo, {totalPages: {name: "totalPages_" + children.componentGlobalName, convertBack: function(value, source, target) {$(target).text(value);}}});

        _self.getList(children, pagerInfo.currentPage);
        
    };

    this.getList = function(children, xPage){
        $(document).wacPage().showBlockUILoader({id:children.panelId, msg:$.i18n.prop('data loading...')});
        
        var params ={
            dataFormat :'json',
            page: xPage
        };
        $.ajax({
            url: WacAppConfig.baseUrl + children.moduleName + "/getList",
            global: true,
            type: "GET",
            data: params,
            dataType: "json",
            success: function(jsonData){
                _self.getListCallBack(children, jsonData);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                Wac.log("getFormData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
            }
        });
    }

    this.getListCallBack = function(children, jsonData){
        Wac.log("WacNavPanelPrototype initDataCallBack", debug);

        if(jsonData.userdata.status == WacEntity.operationStatus.succss)
        {
            $(pagerInfo).setField("currentPage", jsonData["currentPage"]);
            $(pagerInfo).setField("totalPages", jsonData["totalPages"]);

            if(pagerInfo.currentPage == 1){
                $('#btnPrev_' + children.componentGlobalName).button("disable");
            }
            else{
                $('#btnPrev_' + children.componentGlobalName).button("enable");
            }

            if(pagerInfo.currentPage == pagerInfo.totalPages){
                $('#btnNext_' + children.componentGlobalName).button("disable");
            }
            else{
                $('#btnNext_' + children.componentGlobalName).button("enable");
            }

            $("#list_" + children.componentGlobalName).empty();
            if(jsonData['items'].length>0){
                for(i=0;i<jsonData['items'].length;i++)
                {
                    $('<li class="ui-state-default">' + jsonData['items'][i].name +'</li>').appendTo('#list_' + children.componentGlobalName);
                }

                $("#list_" + children.componentGlobalName).selectable({
                    stop: function() {
                        children.selectedItems = [];
                        $( ".ui-selected", this ).each(function() {
                            var index = $("#list_"+children.componentGlobalName+" li").index( this );
                            children.selectedItems.push(jsonData['items'][index]);
                        });

                        $("body").data(children.moduleName + "/selectedItem", children.selectedItems[0]);
                        $.shout(WacAppConfig.event.app_wac_events_show_edit_form, {
                            moduleName: children.moduleName,
                            selectedItems: children.selectedItems
                            });
                    }
                });
            }
            else{
                $('<li class="ui-state-default">' + $.i18n.prop('no options') +'</li>').appendTo('#list_' + children.componentGlobalName);
            }
        }
        else
        {
            $(document).wacPage().showTips(jsonData.userdata.message);
        }
        $(document).wacPage().hideBlockUI(children.panelId);
//            Wac.log($(document).wacTool().dumpObj(jsonData));
    };

    this.deleteData = function(children){
        Wac.log("WacNavPanelPrototype deleteData", debug);
        var ids = [];
        $(children.selectedItems).each(function(){
            ids.push(this.id);
        });

        var params ={dataFormat :'json', id: ids};

//        Wac.log(params, debug);
        $.ajax({
            url: WacAppConfig.baseUrl + children.moduleName + "/delete",
            global: true,
            type: "GET",
            data: params,
            dataType: "json",
            success: function(jsonData){
                children.deleteDataCallBack(jsonData);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                Wac.log("getFormData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
            }
        });
    };

    this.deleteDataCallBack = function(children, jsonData){
        Wac.log("WacNavPanelPrototype deleteDataCallBack", debug);
        children.initData();
        $.shout(children.moduleName + WacAppConfig.event.app_wac_events_data_changed, children.selectedItems);
    };

    this.setupDefaults = function(children, defaultValueObj){
        Wac.log("WacNavPanelPrototype setupDefaults", debug);
    };
}

/*
 *  declare a PanelForm-prototype model class
 */
function WacPanelFormPrototype()
{
    var _self = this;
    var debug = true;
//    var debug = false;

    this.init = function(children){
        children.initLayout();
        children.initData();
        children.bindEvents();
    };

    this.bindEvents = function(children){
        Wac.log("WacPanelFormPrototype bindEvents", debug);
        // show add form
        $(document).hear(children.componentGlobalId, children.moduleName + WacAppConfig.event.app_wac_events_show_add_form, function ($self, data) {  // listenerid, event name, callback
            Wac.log("hear:" + children.moduleName + WacAppConfig.event.app_wac_events_show_add_form, debug);
            if(typeof data.moduleName !== "undefined" && data.moduleName==children.moduleName){
                children.emptyForm(children);
            }
        });

        // show edit form
        $(document).hear(children.componentGlobalId, children.moduleName + WacAppConfig.event.app_wac_events_show_edit_form, function ($self, data) {  // listenerid, event name, callback
            Wac.log("hear:" + children.moduleName + WacAppConfig.event.app_wac_events_show_edit_form, debug);
            if(typeof data.moduleName !== "undefined" && data.moduleName==children.moduleName){
                $("body").data(data.moduleName + "/selectedItem", data.selectedItems[0]);
                children.initData();
            }
        });

        // when data change
        $(document).hear(children.componentGlobalId, children.moduleName + WacAppConfig.event.app_wac_events_data_changed, function ($self, data) {  // listenerid, event name, callback
            Wac.log("hear:" + children.moduleName + WacAppConfig.event.app_wac_events_data_changed, debug);
            $(data).each(function(){
                if(this.id == children.modelEntity.id){
                    children.emptyForm();
                    return false;
                }
                return true;
            });
        });

        $("input[name='input_mode_" + children.componentGlobalName + "']").bind("click", function(){
            if($("#id_"+children.componentGlobalName).val()!=0){
                children.switchInputMode($(this).val());
            }
            else{
                $(document).wacPage().showTips($.i18n.prop('Can not switch to edit mode since data not saved!'));
                children.switchInputMode(WacEntity.formInputMode.add);
            }
        });

        $('#btnSave_' + children.componentGlobalName).bind("click", function(){
            children.saveForm();
        });

        $('#btnPrint_' + children.componentGlobalName).bind("click", function(){
            var params = {
                moduleName: children.moduleName,
                componentCaption: "view" + $("#id_"+children.componentGlobalName).val(),
                moduleAction: "printView",
                printTpl: "htmlEntityViewA",
                dataFormat: "html",
                _search: 'true',
                searchField: 'id',
                searchOper: 'eq',
                searchString: $("#id_"+children.componentGlobalName).val()
            };
            $.shout(WacAppConfig.event.app_wac_events_show_data_print_form, params);
        });

        $('#btnDel_' + children.componentGlobalName).bind("click", function(){
            $(document).wacPage().showConfirm(
                                    $.i18n.prop('Delete confirm'),
                                    function(){  // if yes
                                        $.shout(children.moduleName + WacAppConfig.event.app_wac_events_data_deleted, {id: $("id_" + children.componentGlobalName).val()});
                                    },
                                    function(){}  // if no
                                );
        });
        
    };

    this.emptyForm = function(children){
        Wac.log("WacPanelFormPrototype emptyForm", debug);
        $.each(children.modelEntity, function(key, value){
            children.modelEntity[key] = "";
        });
        $("body").data(children.moduleName + "/selectedItem", children.modelEntity);
        children.initData();
    };

    this.initLayout = function(children){
        Wac.log("WacPanelFormPrototype initLayout", debug);
        
        $("#groupInputMode_" + children.componentGlobalName).buttonset();
        
        $('#btnSave_' + children.componentGlobalName).button();
        $('#btnDel_' + children.componentGlobalName).button();
        $('#btnPrint_' + children.componentGlobalName).button({icons: {primary: "ui-icon-print"}});
        $('#groupFunc_' + children.componentGlobalName).buttonset();

        $(children.componentGlobalId).panel({
            draggable:true,
            width:'100%'
        });
    };

    this.initData = function(children){
        Wac.log("WacPanelFormPrototype initData", debug);

        $(children.formId).link(children.modelEntity);
        if($("body").data(children.moduleName+"/selectedItem")){
            $.each($("body").data(children.moduleName+"/selectedItem"), function(key, value){
    //            Wac.log(key + " : "+ value, debug);
                $(children.modelEntity).setField(key, value);
            })
        }
        $(children.formId).unlink(children.modelEntity);

        if($("body").data(children.moduleName+"/selectedItem") && $("body").data(children.moduleName+"/selectedItem").id!==undefined && $("body").data(children.moduleName+"/selectedItem").id!==""){
            children.switchInputMode(WacEntity.formInputMode.edit);
        }
        else{
            children.switchInputMode(WacEntity.formInputMode.add);
        }
        
        $(document).wacPage().showBlockUILoader({id:children.panelId, msg:$.i18n.prop('data loading...')});

    };

    this.initDataCallBack = function(children, jsonData){
        Wac.log("WacPanelFormPrototype initDataCallBack", debug);
        $(document).wacPage().hideBlockUI(children.formId);
//            Wac.log($(document).wacTool().dumpObj(jsonData));
    };

    this.setupDefaults = function(children, defaultValueObj){
        Wac.log("WacPanelFormPrototype setupDefaults", debug);
    };

    this.switchInputMode = function(children, v){
        Wac.log("WacPanelFormPrototype switchInputMode: "+v, debug);
        children.inputMode = v;
        $("input[name='input_mode_" + children.componentGlobalName + "'][value='" + v + "']").attr("checked", true);
        $("#groupInputMode_" + children.componentGlobalName).buttonset("refresh");

        if( v == WacEntity.formInputMode.add){
            $('#btnDel_' + children.componentGlobalName).button("disable");
            $('#btnPrint_' + children.componentGlobalName).button("disable");
        }
        else{
            $('#btnDel_' + children.componentGlobalName).button("enable");
            $('#btnPrint_' + children.componentGlobalName).button("enable");
        }
    };

    this.validateMainForm = function(children){
        Wac.log("WacPanelFormPrototype validateMainForm", debug);

        var validateFlag = true;
        if (!$(children.formId).validationEngine({returnIsValid:true}))
        {
            validateFlag = false;
        }

        if($("#id_"+children.componentGlobalName).val()==0 || $("#id_"+children.componentGlobalName).val()===undefined){
             children.switchInputMode(WacEntity.formInputMode.add);
        }

        return validateFlag;
    };

    this.saveForm = function(children){
        Wac.log("WacPanelFormPrototype submitMainForm", debug);

        if(!children.validateMainForm()){
            return;
        }

        $(document).wacPage().showBlockUILoading(children.formId, $.i18n.prop('processing...'));

        var extraParams = "dataFormat=json";
        var submitUrl;

        if(children.inputMode == WacEntity.formInputMode.add){
            submitUrl = WacAppConfig.baseUrl + children.moduleName + "/add";
        }
        else{
            submitUrl = WacAppConfig.baseUrl + children.moduleName + "/edit";
        }

//        Wac.log(children.inputMode + ":" + submitUrl, debug);
//        Wac.log($(children.formId).serialize(), debug);

        $.ajax({
            url: submitUrl,
            //        url: WacAppConfig.baseUrl + "test/ajaxTest" ,
            global: true,
            type: "GET",
            data: $(children.formId).serialize() + "&" + extraParams,
            dataType: "json",
            success: function(jsonData){
                children.saveFormCallBack(jsonData);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                Wac.log("getFormData Error: " + $(document).wacTool().dumpObj(this)); // the options for this ajax request
            }
        });
    };

    this.saveFormCallBack = function(children, jsonData){
        Wac.log("WacPanelFormPrototype saveFormCallBack", debug);
        
        if(children.inputMode == WacEntity.formInputMode.add){
            children.emptyForm();
        }
        $.shout(children.moduleName + WacAppConfig.event.app_wac_events_data_saved, {moduleName: children.moduleName});
        $(document).wacPage().showTips(jsonData.info.message);
        $(document).wacPage().hideBlockUI(children.formId);
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


// callback prototype for jqgird
WacJqGridCallback = function(modulePrefixName)
{
    this.save = function(response){
        Wac.log( modulePrefixName + "SaveCallback");
        //    Wac.log($.dump($(moduleListId).jqGrid('getGridParam', 'userData')));
        //    Wac.log(response.responseText);
        WacEntity.ajaxData.response = eval('(' + response.responseText + ')');
        if(WacEntity.ajaxData.response.userdata.status == WacEntity.operationStatus.succss)
        {
            return true;
        }
        else
        {
            $(document).wacPage().showTips(WacEntity.ajaxData.response.userdata.message);
            return [false, WacEntity.ajaxData.response.userdata.message];
        }
    };

    this.validate = function(response, postdata){
        Wac.log( modulePrefixName + "ValidateCallback");

        WacEntity.ajaxData.response = eval('(' + response.responseText + ')');
//         Wac.log(WacEntity.ajaxData.response);
//         Wac.log(postdata);

        if(WacEntity.ajaxData.response.userdata.status == WacEntity.operationStatus.succss)
        {
            return [true, "", ""];
        }
        else
        {
            return [false, WacEntity.ajaxData.response.userdata.message];
        }
    };

    this.view = function()
    {
        Wac.log( modulePrefixName + "ViewCallback");
    };

    this.edit = function()
    {
        Wac.log( modulePrefixName + "EditCallback");
    };

    this.add = function()
    {
        Wac.log( modulePrefixName + "AddCallback");
    };

    this.del = function()
    {
        Wac.log( modulePrefixName + "DelCallback");
    };

    this.search = function()
    {
        Wac.log( modulePrefixName + "SearchCallback");
    };

}

