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
        wacAppController.appsContainer.push(objAppSystemController, objAppStockController);
        wacAppController.initLayout();

        wacAppController.bindEvents();
        wacAppController.initDefaultAppLayout();
    
    //       wacHideBlockUI();

    }
);

wacAppController = {
    appsContainer: [],
    layout: null,
    layoutSettings: null,
    bindEvents: function(){
        $("#btnAppStockController").bind("click", {}, function(e){
            wacAppController.showApp("AppStockController");
        });

        $("#btnAppSystemController").bind("click", {}, function(e){
            wacAppController.showApp("AppSystemController");
        });
    }
    ,
    showApp: function(appName){
        $.each(this.appsContainer, function(i){
            if(this.name == appName){
                this.initLayout();
            }
            else{
                this.hideLayout();
            }
        //                Wac.log(i + ":" + this.name);
        })
    }
    ,
    initDefaultAppLayout: function(){
        this.showApp("AppStockController");
    },
    initLayout: function(){
        // create WAC Application LAYOUT
        this.layoutSettings = (this.layoutSettings == null) ? this.initLayoutSettings() : this.layoutSettings;
        this.layout = $("#wac_app_body").layout( this.layoutSettings );

        // save selector strings to vars so we don't have to repeat it
        // must prefix paneClass with "body > " to target ONLY the wacAppBaseLayout panes
        var westSelector = "body > .ui-layout-west"; // outer-west pane
        var eastSelector = "body > .ui-layout-east"; // outer-east pane

        // CREATE SPANs for pin-buttons - using a generic class as identifiers
        $("<span></span>").addClass("pin-button").prependTo( westSelector );
        $("<span></span>").addClass("pin-button").prependTo( eastSelector );
        // BIND events to pin-buttons to make them functional
        this.layout.addPinBtn( westSelector +" .pin-button", "west");
        this.layout.addPinBtn( eastSelector +" .pin-button", "east" );

        // CREATE SPANs for close-buttons - using unique IDs as identifiers
        $("<span></span>").attr("id", "west-closer" ).prependTo( westSelector );
        $("<span></span>").attr("id", "east-closer").prependTo( eastSelector );
        // BIND layout events to close-buttons to make them functional
        this.layout.addCloseBtn("#west-closer", "west");
        this.layout.addCloseBtn("#east-closer", "east");        
        return this.layout;
    }
    ,
    hideLayout: function(){
        $("#wac_app_body").hide();
    }
    ,
    initLayoutSettings: function(){
        return {
            name: "wacAppBaseLayout" // NO FUNCTIONAL USE, but could be used by custom code to 'identify' a layout
            // options.defaults apply to ALL PANES - but overridden by pane-specific settings
            ,
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
}


/***** init section, end *****/