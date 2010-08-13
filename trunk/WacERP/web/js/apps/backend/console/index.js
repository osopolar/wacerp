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
var wacAppBaseLayout;
var wacAppBaseLayoutSettings;
/***** variables declartion section, end *****/


/***** init section, begin *****/
$(document).ready(
    function() {
        //       wacShowBlockUILoading();

        initConsoleLayoutSetting();
        
        initConsoleLayout();

        bindConsoleEvents();
    
    //       wacHideBlockUI();

    }
    );



function bindConsoleEvents()
{
    $("#btnAppStockManagement").bind("click", {}, function(e){
        
    });

    $("#btnAppSystemManagement").bind("click", {}, function(e){

    });
}

function initConsoleLayout()
{
    // create the Wac Application Base LAYOUT
    wacAppBaseLayout = $("body").layout( wacAppBaseLayoutSettings );

    /*******************************
     ***  CUSTOM LAYOUT BUTTONS  ***
     *******************************/
    

    // save selector strings to vars so we don't have to repeat it
    // must prefix paneClass with "body > " to target ONLY the wacAppBaseLayout panes
    var westSelector = "body > .ui-layout-west"; // outer-west pane
    var eastSelector = "body > .ui-layout-east"; // outer-east pane

    // CREATE SPANs for pin-buttons - using a generic class as identifiers
    $("<span></span>").addClass("pin-button").prependTo( westSelector );
    $("<span></span>").addClass("pin-button").prependTo( eastSelector );
    // BIND events to pin-buttons to make them functional
    wacAppBaseLayout.addPinBtn( westSelector +" .pin-button", "west");
    wacAppBaseLayout.addPinBtn( eastSelector +" .pin-button", "east" );

    // CREATE SPANs for close-buttons - using unique IDs as identifiers
    $("<span></span>").attr("id", "west-closer" ).prependTo( westSelector );
    $("<span></span>").attr("id", "east-closer").prependTo( eastSelector );
    // BIND layout events to close-buttons to make them functional
    wacAppBaseLayout.addCloseBtn("#west-closer", "west");
    wacAppBaseLayout.addCloseBtn("#east-closer", "east");

}

function initConsoleLayoutSetting()
{
    /*
        *#######################
        * wacAppBaseLayoutSettings
        *#######################
        *
        * This configuration illustrates how extensively the layout can be customized
        * ALL SETTINGS ARE OPTIONAL - and there are more available than shown below
        *
        * These settings are set in 'sub-key format' - ALL data must be in a nested data-structures
        * All default settings (applied to all panes) go inside the defaults:{} key
        * Pane-specific settings go inside their keys: north:{}, south:{}, center:{}, etc
        */
    wacAppBaseLayoutSettings = {
        name: "wacAppBaseLayout" // NO FUNCTIONAL USE, but could be used by custom code to 'identify' a layout
        // options.defaults apply to ALL PANES - but overridden by pane-specific settings
        ,
        defaults: {
            size:                   "auto"
            ,
            minSize:                50
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
            initClosed:             true
        }
        ,
        west: {
            size:                           250
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
            paneSelector: "#wac_app_container"             // sample: use an ID to select pane instead of a class
            ,
            onresize:     "innerLayout.resizeAll"    // resize INNER LAYOUT when center pane resizes
            ,
            minWidth:     200
            ,
            minHeight:    200
        }
    };

}

/***** init section, end *****/