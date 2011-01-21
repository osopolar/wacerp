/*
 * init app system management layout
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage wacAppSystemController
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 * @replace variables:
 * wacAppSystemController / WacAppSystemController
 *
 */

/***** variables declartion section, begin *****/
var objAppSystemController;
/***** variables declartion section, end *****/


/***** init section, begin *****/
$(document).ready(
    function() {
        $(document).wacPage().showBlockUILoading();
        
        objAppSystemController.bindEvents();
        objAppSystemController.init();

    //        $(document).wacTool().dumpObj({name:"ben"});
    //        $('#appStockControllerLabel').wacTool().test({name:"ben"});

        $(document).wacPage().hideBlockUI();

        // put it into wac apps container
        //wacAppController.appsContainer.push(objAppSystemController);
        wacAppController.appsContainer = wacAppController.appsContainer.add(objAppSystemController);

    }
);

objAppSystemController = {
    name: "WacAppSystemController",
    layout: objAppSystemControllerLayout,
    westMenu: null,
    tab: null,
    bindEvents: function(){
//        Wac.log("objAppSystemController init");
    }
    ,
    init: function(){
        this.initWestMenu("#wacAppSystemControllerMenu");
        this.initTab("#wacAppSystemControllerTabs");
    }
    ,
    initLayout: function(){  // invoke by main app controller
        return this.layout.init();
    }
    ,
    hideLayout: function(){
        this.layout.hide();
    },
    initTab: function(tabId){
        this.tab = $(tabId).tabs({
            tabTemplate: '<li><a href="#{href}">#{label}</a> <span class="ui-icon ui-icon-close">Close Tab</span></li>',
            add: function(event, ui) {
//                var tab_content = $tab_content_input.val() || 'Tab '+tab_counter+' content.';
//                $(ui.panel).append('<p>'+tab_content+'</p>');
            
                objAppSystemController.tab.tabs('select', '#' + ui.panel.id); // select just added tab
            }
        });

       

        // close icon: removing the tab on click
        // note: closable tabs gonna be an option in the future - see http://dev.jqueryui.com/ticket/3924
        $(tabId + ' span.ui-icon-close').live('click', function() {
            var index = $('li', objAppSystemController.tab).index($(this).parent());
            objAppSystemController.tab.tabs('remove', index);
        });
    },
    initWestMenu: function(menuId){
        this.westMenu = $(menuId).jqGrid({
            url: WacAppConfig.baseUrl + "wacAppSystemController/getWestMenu/dataFormat/xml",
            datatype: "xml",
            height: "auto",
            pager: false,
            loadui: "disable",
            colNames: ["id",$.i18n.prop("Options"),"url"],
            colModel: [
            {
                name: "id",
                width:1,
                hidden:true,
                key:true
            },
            {
                name: "menu",
                width: 238,
                resizable: false,
                sortable:false
            },
            {
                name: "url",
                width:1,
                hidden:true
            }
            ],
            treeGrid: true,
            caption: $.i18n.prop("Management Menu"),
            ExpandColumn: "menu",
            autowidth: true,
            //            width: 180,
            rowNum: 200,
            ExpandColClick: true,
            treeIcons: {
                leaf:'ui-icon-document-b'
            },
            onSelectRow: function(rowid) {
                var treedata = $(menuId).jqGrid('getRowData',rowid);
                if(treedata.isLeaf=="true") {
//                    $(document).wacTool().dumpObj(treedata);
                    var st = "#t"+treedata.id;
                    if($(st).html() != null ) {
                        objAppSystemController.tab.tabs('select',st);
                    } else {
                        objAppSystemController.tab.tabs('add', st, treedata.menu);
                        $(st, objAppSystemController.tab.id).load(treedata.url);
                    }
                }
            }
        });
    }
}


/***** init section, end *****/