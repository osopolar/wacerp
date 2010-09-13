/*
 * init app stock management layout
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage appStockController
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 * @replace variables:
 * appSystemController / AppStockController
 *
 */

/***** variables declartion section, begin *****/
var objAppSystemController;
var objAppSystemControllerLayout;
/***** variables declartion section, end *****/


/***** init section, begin *****/
$(document).ready(
    function() {
        //       wacShowBlockUILoading();
        
        objAppSystemController.bindEvents();

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
    },
    initLayout: function(){
        return this.layout.init();
    }
    ,
    hideLayout: function(){
        this.layout.hide();
    }
}

// put it into wac apps container
wacAppController.appsContainer.push(objAppSystemController);
/***** init section, end *****/