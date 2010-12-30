/*
 * init app test management layout
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage wacAppTestController
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 * @replace variables:
 * wacAppTestController / WacAppTestController
 *
 */

/***** variables declartion section, begin *****/
var objAppTestController;
/***** variables declartion section, end *****/


/***** init section, begin *****/
$(document).ready(
    function() {
        //       wacShowBlockUILoading();
        
        objAppTestController.bindEvents();

    //        $(document).wacTool().dumpObj({name:"ben"});
    //        $('#appTestControllerLabel').wacTool().test({name:"ben"});

    //       wacHideBlockUI();

        // put it into wac apps container
        //wacAppController.appsContainer.push(objAppTestController);
        wacAppController.appsContainer = wacAppController.appsContainer.add(objAppTestController);
    }
);

objAppTestController = {
    name: "WacAppTestController",
    layout: objAppTestControllerLayout,
    bindEvents: function(){
//        Wac.log("objAppTestController init");
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