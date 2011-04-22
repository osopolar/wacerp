/*
 * init app stock management layout
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage wacAppSystemController
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 * @replace variables:
 * wacAppSystemController / AppSystemController
 *
 */

/***** variables declartion section, begin *****/

//var objAppSystemControllerLayout;

/***** variables declartion section, end *****/


/***** init section, begin *****/
var options = {
    appId: "#wacAppSystemController",
    settings: {
        defaults: {
            size:                   "auto"
            ,
            minSize:                90
            ,
            paneClass:              "pane"         // default = 'ui-layout-pane'
            ,
            resizerClass:           "resizer"    // default = 'ui-layout-resizer'
            ,
            togglerClass:           "toggler"    // default = 'ui-layout-toggler'
            ,
            buttonClass:            "button"    // default = 'ui-layout-button'
            ,
            contentSelector:        ".layoutPaneContent"    // inner div to auto-size so only it scrolls, not the entire pane!
            ,
            contentIgnoreSelector:  "span"        // 'paneSelector' for content to 'ignore' when measuring room for content
            ,
            togglerLength_open:     35            // WIDTH of toggler on north/south edges - HEIGHT on east/west edges
            ,
            togglerLength_closed:   35            // "100%" OR -1 = full height
            ,
            hideTogglerOnSlide:     true        // hide the toggler when pane is 'slid open'
            ,
            togglerTip_open:        "Close This Pane"
            ,
            togglerTip_closed:      "Open This Pane"
            ,
            resizerTip:             "Resize This Pane"
            //    effect defaults - overridden on some panes
            ,
            fxName:                 "slide"        // none, slide, drop, scale
            ,
            fxSpeed_open:           750
            ,
            fxSpeed_close:          1500
            ,
            fxSettings_open:        {
                easing: "easeInQuint"
            }
            ,
            fxSettings_close:        {
                easing: "easeOutQuint"
            }
        }
        ,
        north: {
            maxSize:                200
            ,
            spacing_closed:         0            // HIDE resizer & toggler when 'closed'
            ,
            slidable:              false        // REFERENCE - cannot slide if spacing_closed = 0
            ,
            initClosed:            true
        }
        ,
        south: {
            size:      30
            ,
            minSize:   20
            ,
            maxSize:   200
            ,
//            spacing_closed:         0            // HIDE resizer & toggler when 'closed'
//            ,
            slidable:               false        // REFERENCE - cannot slide if spacing_closed = 0
            ,
            initClosed:             false
        }
        ,
        west: {
            size:                  250
            ,
            slidable:              false        // REFERENCE - cannot slide if spacing_closed = 0
            ,
            initClosed:            false
        }
        ,
        east: {
            size:                    250
            ,
            spacing_closed:         0            // HIDE resizer & toggler when 'closed'
            ,
            slidable:               false        // REFERENCE - cannot slide if spacing_closed = 0
            ,
            initClosed:             true
        }
        ,
        center: {
            paneSelector: "#wacAppSystemControllerCenter"             // sample: use an ID to select pane instead of a class
            ,
            onresize:     ""    // resize INNER LAYOUT when center pane resizes
            ,
            minWidth:     200
            ,
            minHeight:    200
        }
    }
};
// declare app layout object
var objAppSystemControllerLayout = new WacLayout(options);

// override decorate method, decorate the layout
objAppSystemControllerLayout.decorate = function(){
    Wac.log("objAppSystemControllerLayout.decorate");
    
//    var uiLayout = this.getUiLayout();
    
}
/***** init section, end *****/