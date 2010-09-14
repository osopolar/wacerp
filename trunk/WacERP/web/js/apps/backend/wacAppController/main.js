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

        /***     init main layout      ***/
        wacAppController.initLayout();

        /***     bind main controller events      ***/
        wacAppController.bindEvents();

        /***     bind main controller events      ***/
//        wacAppController.initDefaultApp("AppStockController");
//        wacAppController.initDefaultApp("AppTestController");
        wacAppController.initDefaultApp("AppSystemController");



    //       wacHideBlockUI();

    }
    );

wacAppController = {
    name: "AppController",
    appsContainer: [],
    layout: objWacAppControllerLayout,
    bindEvents: function(){
        $("#appNavBar > li").bind("click", {}, function(e){
//            Wac.log(e.target.id);
//            Wac.log(e.currentTarget.id);
            wacAppController.showApp(e.currentTarget.id.substring(3));
        });
        
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
    initDefaultApp: function(appName){
        return this.showApp(appName);
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