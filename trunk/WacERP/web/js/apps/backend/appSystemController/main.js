/*
 * init app system management layout
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage appSystemController
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 * @replace variables:
 * appSystemController / AppSystemController
 *
 */

/***** variables declartion section, begin *****/
var objAppSystemController;
var objAppSystemControllerLayout;  // inited in layout.js
var objAppSystemControllerTabs;  // 
/***** variables declartion section, end *****/


/***** init section, begin *****/
$(document).ready(
    function() {
        //       wacShowBlockUILoading();
        
        objAppSystemController.bindEvents();
        objAppSystemController.initWestMenu("#appSystemControllerMenu");

        var objAppSystemControllerTabs =$('#appSystemControllerTabs').tabs({
//            add: function(e, ui) {
//                // append close thingy
//                $(ui.tab).parents('li:first')
//                .append('<span class="ui-tabs-close ui-icon ui-icon-close" title="Close Tab"></span>')
//                .find('span.ui-tabs-close')
//                .click(function() {
//                    objAppSystemControllerTabs.tabs('remove', $('li', objAppSystemControllerTabs).index($(this).parents('li:first')[0]));
//                });
//                // select just added tab
//                objAppSystemControllerTabs.tabs('select', '#' + ui.panel.id);
//            }
        });

    //        $(document).wacTool().dumpObj({name:"ben"});
    //        $('#appStockControllerLabel').wacTool().test({name:"ben"});

    //       wacHideBlockUI();

    }
);

objAppSystemController = {
    name: "AppSystemController",
    layout: objAppSystemControllerLayout,
    bindEvents: function(){
//        Wac.log("objAppSystemController init");
    }
    ,
    initLayout: function(){
        return this.layout.init();
    }
    ,
    hideLayout: function(){
        this.layout.hide();
    },
    initWestMenu: function(menuId){
        $(menuId).jqGrid({
            url: BASE_URL + "/appSystemController/getWestMenu",
            datatype: "xml",
            height: "auto",
            pager: false,
            loadui: "disable",
            colNames: ["id","选项","url"],
            colModel: [
            {
                name: "id",
                width:1,
                hidden:true,
                key:true
            },
            {
                name: "menu",
                width: 180,
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
            caption: "管理菜单",
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
                    Wac.log(treedata.id + " : " + treedata.url);
                    //treedata.url
//                    var st = "#t"+treedata.id;
//                    if($(st).html() != null ) {
//                        objAppSystemControllerTabs.tabs('select',st);
//                    } else {
//                        objAppSystemControllerTabs.tabs('add',st, treedata.menu);
//                        $(st,"#appSystemManagementMenuTabs").load(treedata.url);
//                    }
                }
            }
        });
    }
}

// put it into wac apps container
wacAppController.appsContainer.push(objAppSystemController);
/***** init section, end *****/