/*
 * init app stock management layout
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage appStockManagement
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 * @replace variables:
 * appStockManagement / AppStockManagement
 *
 */

/***** variables declartion section, begin *****/
var appStockManagementLayout;
var objAppStockManagement;
/***** variables declartion section, end *****/


/***** init section, begin *****/
$(document).ready(
    function() {
        //       wacShowBlockUILoading();

//        objAppStockManagement.initAppStockManagementLayoutSettings();
        bindAppStockManagementEvents();
    
    //       wacHideBlockUI();

    }
    );

objAppStockManagement = {
    layoutSettings: {},
    initLayout: function(){
        // create WAC Application LAYOUT
        $("#appStockManagement").show();
        appStockManagementLayout = $("#appStockManagement").layout( this.layoutSettings );
    }
    ,
    hideLayout: function(){
        $("#appStockManagement").hide();
    }
    ,
    initLayoutSettings: function(){
        /*
        *#######################
        * appStockManagementLayoutSettings
        *#######################
        *
        * This configuration illustrates how extensively the layout can be customized
        * ALL SETTINGS ARE OPTIONAL - and there are more available than shown below
        *
        * These settings are set in 'sub-key format' - ALL data must be in a nested data-structures
        * All default settings (applied to all panes) go inside the defaults:{} key
        * Pane-specific settings go inside their keys: north:{}, south:{}, center:{}, etc
        */

        this.appStockManagementLayoutSettings = {
            initHidden : false
            ,
            applyDefaultStyles:    true // basic styling for testing & demo purposes
            ,
            minSize:        20 // TESTING ONLY
            ,
            spacing_closed:    	14
            ,
            north__spacing_closed:    	8
            ,
            south__spacing_closed:    	8
            ,
            north__togglerLength_closed:	-1 // = 100% - so cannot 'slide open'
            ,
            south__togglerLength_closed:	-1
            ,
            fxName:        	"slide" // do not confuse with "slidable" option!
            ,
            fxSpeed_open:    	1000
            ,
            fxSpeed_close:    	2500
            ,
            fxSettings_open:    {
                easing: "easeInQuint"
            }
            ,
            fxSettings_close:    {
                easing: "easeOutQuint"
            }
            ,
            north__fxName:    	"none"
            ,
            south__fxName:    	"drop"
            ,
            south__fxSpeed_open:    	500
            ,
            south__fxSpeed_close:    	1000
            //,	initClosed:        true
            ,
            center__minWidth:    200
            ,
            center__minHeight:    200
        };
    }
}

function bindAppStockManagementEvents()
{
    
}

/***** init section, end *****/