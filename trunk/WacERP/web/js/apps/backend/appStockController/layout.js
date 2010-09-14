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
//var objAppStockControllerLayout;
/***** variables declartion section, end *****/

$(document).ready(
    function() {

        
    }
    );

/***** init section, begin *****/
var options = {
    appId: "#appStockController",
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
            contentSelector:        ".content"    // inner div to auto-size so only it scrolls, not the entire pane!
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
            initClosed:             false
        }
        ,
        west: {
            size:					250
            ,
            spacing_closed:			21			// wider space when closed
            ,
            togglerLength_closed:	21			// make toggler 'square' - 21x21
            ,
            togglerAlign_closed:	"top"		// align to top of resizer
            ,
            togglerLength_open:		0			// NONE - using custom togglers INSIDE west-pane
            ,
            togglerTip_open:		"Close West Pane"
            ,
            togglerTip_closed:		"Open West Pane"
            ,
            resizerTip_open:		"Resize West Pane"
            ,
            slideTrigger_open:		"click" 	// default
            ,
            initClosed:				true
            //	add 'bounce' option to default 'slide' effect
            ,
            fxSettings_open:		{
                easing: "easeOutBounce"
            }
        }
        ,
        east: {
            size:                    250
            ,
            spacing_closed:         0            // HIDE resizer & toggler when 'closed'
            ,
            slidable:               false        // REFERENCE - cannot slide if spacing_closed = 0
            ,
            initClosed:             false
        }
        ,
        center: {
            paneSelector: "#appStockControllerCenter"             // sample: use an ID to select pane instead of a class
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
objAppStockControllerLayout = new WacLayout(options);

// override decorate method, decorate the layout
objAppStockControllerLayout.decorate = function(){
    Wac.log("objAppStockControllerLayout.decorate");

    var uiLayout = this.getUiLayout();
    // must prefix paneClass with "body > " to target ONLY the wacAppBaseLayout panes
    var westSelector = "#appStockController  .ui-layout-west"; // outer-west pane
    var eastSelector = "#appStockController  .ui-layout-east"; // outer-east pane

    // CREATE SPANs for pin-buttons - using a generic class as identifiers
    $("<span></span>").addClass("pin-button").prependTo( westSelector );
    $("<span></span>").addClass("pin-button").prependTo( eastSelector );

    // BIND events to pin-buttons to make them functional
    uiLayout.addPinBtn( westSelector +" .pin-button", "west");
    uiLayout.addPinBtn( eastSelector +" .pin-button", "east" );

    // CREATE SPANs for close-buttons - using unique IDs as identifiers
    $("<span></span>").attr("id", "west-closer" ).prependTo( westSelector );
    $("<span></span>").attr("id", "east-closer").prependTo( eastSelector );
    // BIND layout events to close-buttons to make them functional
    uiLayout.addCloseBtn("#west-closer", "west");
    uiLayout.addCloseBtn("#east-closer", "east");

//        $(document).wacTool().dumpObj(uiLayout.options);
}

/***** init section, end *****/