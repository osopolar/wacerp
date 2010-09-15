/*
 * init app test management layout
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage appTestController
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 * @replace variables:
 * appTestController / AppTestController
 *
 */

/***** variables declartion section, begin *****/
var objAppTestController;
var objAppTestControllerLayout;  // inited in layout.js
/***** variables declartion section, end *****/


/***** init section, begin *****/
$(document).ready(
    function() {
        //       wacShowBlockUILoading();
        
        objAppTestController.bindEvents();

    //        $(document).wacTool().dumpObj({name:"ben"});
    //        $('#appTestControllerLabel').wacTool().test({name:"ben"});

    //       wacHideBlockUI();

    }
);

objAppTestController = {
    name: "AppTestController",
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

// put it into wac apps container
wacAppController.appsContainer.push(objAppTestController);
/***** init section, end *****/