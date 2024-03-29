/*
 * init app stock management layout
 *
 * 8/12/2010 6:08:31 PM
 * @package    WacERP
 * @subpackage appSystemController
 * @author     Ben Bi <jianbinbi@gmail.com>
 * @version    8/12/2010 6:08:31 PM
 * @replace variables:
 * wacAppController / wacAppController
 *
 */

/***** variables declartion section, begin *****/

var options = {
    appId: "#wacAppController",
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
            spacing_open:            1            // cosmetic spacing
            ,
            togglerLength_open:      0            // HIDE the toggler button
            ,
            togglerLength_closed:    -1            // "100%" OR -1 = full width of pane
            ,
            resizable:             false
            ,
            slidable:              false
            //    override default effect
            ,
            fxName:                    "none"
        }
        ,
        south: {
            maxSize:                200
            ,
            spacing_closed:         0            // HIDE resizer & toggler when 'closed'
            ,
            slidable:               false        // REFERENCE - cannot slide if spacing_closed = 0
            ,
            initClosed:             true
        }
        ,
        west: {
            size:                   250
            ,
            spacing_closed:         0            // HIDE resizer & toggler when 'closed'
            ,
            slidable:               false        // REFERENCE - cannot slide if spacing_closed = 0
            ,
            initClosed:             true
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
            paneSelector: "#wacAppContainer"             // sample: use an ID to select pane instead of a class
            ,
            onresize:     ""    // resize INNER LAYOUT when center pane resizes
            ,
            minWidth:     200
            ,
            minHeight:    200
        }
    }
};

// create WAC Application LAYOUT
var objWacAppControllerLayout = new WacLayout(options);

/***** variables declartion section, end *****/


/***** init section, begin *****/

//$(document).ready(
//    function() {
//
//    }
//    )

/***** init section, end *****/