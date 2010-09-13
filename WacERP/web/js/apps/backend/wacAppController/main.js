/*
 * init wac application
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage console
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 */

/***** variables declartion section, begin *****/
var wacAppController;
/***** variables declartion section, end *****/


/***** init section, begin *****/
$(document).ready(
    function() {
        //       wacShowBlockUILoading();
//        wacAppController.appsContainer.push(objAppSystemController, objAppStockController);
        wacAppController.initLayout();

//        $(document).wacTool().dumpObj(uiLayout.options);
        wacAppController.bindEvents();
        wacAppController.initDefaultAppLayout();

        wacAppController.getApp("AppStockController").layout.decorate();
        wacAppController.getApp("AppSystemController").layout.decorate();


    //       wacHideBlockUI();

    }
    );

wacAppController = {
    name: "AppController",
    appsContainer: [],
    layout: objWacAppControllerLayout,
    bindEvents: function(){
        $("#appNavBar > li").bind("click", {}, function(e){
            Wac.log(e.target.id);
        });

//        $("#btnAppStockController").bind("click", {}, function(e){
//            wacAppController.showApp("AppStockController");
//        });
//
//        $("#btnAppSystemController").bind("click", {}, function(e){
//            wacAppController.showApp("AppSystemController");
//        });
//
//        $("#btnAppTestController").bind("click", {}, function(e){
//            wacAppController.showApp("AppTestController");
//        });
    }
    ,
    getApp: function(appName){
        var app = null;
        $.each(this.appsContainer, function(i){
            if(this.name == appName){
                app = this;
                return;
            }
        })
        return app;
    }
    ,
    showApp: function(appName){
        var uiLayout = null;
        $.each(this.appsContainer, function(i){
            if(this.name != appName){
                this.hideLayout();
            }
            else{
                uiLayout = this.initLayout();
            }
//            Wac.log(i + ":" + this.name);
        })
        return uiLayout;
    }
    ,
    initDefaultAppLayout: function(){
        return this.showApp("AppStockController");
    },
    initLayout: function(opts){
        return this.layout.init();  // return UI LAYOUT
    }
    ,
    hideLayout: function(){
        this.layout.hide();
    }
    
}


/***** init section, end *****/