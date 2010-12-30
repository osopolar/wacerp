/*
 * init app stock management layout
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage appStockController
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 * @replace variables:
 * appStockController / AppStockController
 *
 */

/***** variables declartion section, begin *****/
var objAppStockController;
/***** variables declartion section, end *****/


/***** init section, begin *****/
$(document).ready(
    function() {
        //       wacShowBlockUILoading();
        
        objAppStockController.bindEvents();
        

    //        $(document).wacTool().dumpObj({name:"ben"});
    //        $('#appStockControllerLabel').wacTool().test({name:"ben"});

    //       wacHideBlockUI();
        
        // put it into wac apps container
        //wacAppController.appsContainer.push(objAppStockController);
        wacAppController.appsContainer = wacAppController.appsContainer.add(objAppStockController);

    }
);

objAppStockController = {
    name: "AppStockController",
    layout: objAppStockControllerLayout,
    bindEvents: function(){
//        Wac.log("objAppStockController init");
    },
    initLayout: function(){
        return this.layout.init();
    }
    ,
    hideLayout: function(){
        this.layout.hide();
    }
}



/***** init section, end *****/