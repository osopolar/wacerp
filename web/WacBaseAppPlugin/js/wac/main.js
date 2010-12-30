/*
 * wac global setting class
 * http://www.WebAppClub.com/
 *
 * Copyright (c) 2010 JianBinBi (WebAppClub.com)
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * Date: 2010-09-07
 *
 * the plugin js template come from http://jamietalbot.com/2010/08/26/object-oriented-jquery-plugins-mk-2/
 *
 */

/*
 * global system variable object, provides conveniences
 */
var Wac = {
//    debug: false,
    debug: true,

    log: function(msg){
        if(this.debug){
            if(!$.browser.msie && window.console && window.console.log){
                //        console.log($.browser.version);
                if(typeof(msg)=='string') {
                    window.console.log("debugLog: " + msg);
                }
                else{
                    window.console.log(msg);
                }
            }
            else
            {
                alert(msg);
            }
        }


    //    if($("#debugDiv").length == 0)
    //    {
    //        $("body").append("<div id='debugDiv' class='code'></div>");
    //    }
    //    $("#debugDiv")[0].innerHTML = msg;
    }

}

/*
 *  WacLayout class
 */
WacLayout = function(options){
    var settings = null;
    
    var _instance = null;
    var _options = options;

    return {  // declare public methods
        init: function(){
            // create WAC Application LAYOUT
            $(_options.appId).show();
            settings = (settings == null) ? this.initSettings(_options) : settings;
            _instance = $(_options.appId).layout( settings );
            this.decorate();
            //        $(document).wacTool().dumpObj(settings);
            return _instance;
        }
        ,
        getUiLayout: function()
        {
            return _instance;
        }
        ,
        decorate: function(){
            Wac.log("layout.decorate");
        }
        ,
        hide: function(){
            $(_options.appId).hide();
        }
        ,
        initSettings: function(){
            /*
            *#######################
            * appSystemControllerLayoutSettings
            *#######################
            *
            * This configuration illustrates how extensively the layout can be customized
            * ALL SETTINGS ARE OPTIONAL - and there are more available than shown below
            *
            * These settings are set in 'sub-key format' - ALL data must be in a nested data-structures
            * All default settings (applied to all panes) go inside the defaults:{} key
            * Pane-specific settings go inside their keys: north:{}, south:{}, center:{}, etc
            */

            var defaults = {
                name: _options.appId + "Layout" // NO FUNCTIONAL USE, but could be used by custom code to 'identify' a layout
            // _options.defaults apply to ALL PANES - but overridden by pane-specific settings
            };

//            var defaults = {
//                size:                   "auto"
//                ,
//                minSize:                90
//                ,
//                paneClass:              "pane"         // default = 'ui-layout-pane'
//                ,
//                resizerClass:           "resizer"    // default = 'ui-layout-resizer'
//                ,
//                togglerClass:           "toggler"    // default = 'ui-layout-toggler'
//                ,
//                buttonClass:            "button"    // default = 'ui-layout-button'
//                ,
//                contentSelector:        ".content"    // inner div to auto-size so only it scrolls, not the entire pane!
//                ,
//                contentIgnoreSelector:  "span"        // 'paneSelector' for content to 'ignore' when measuring room for content
//                ,
//                togglerLength_open:     35            // WIDTH of toggler on north/south edges - HEIGHT on east/west edges
//                ,
//                togglerLength_closed:   35            // "100%" OR -1 = full height
//                ,
//                hideTogglerOnSlide:     true        // hide the toggler when pane is 'slid open'
//                ,
//                togglerTip_open:        "Close This Pane"
//                ,
//                togglerTip_closed:      "Open This Pane"
//                ,
//                resizerTip:             "Resize This Pane"
//                //    effect defaults - overridden on some panes
//                ,
//                fxName:                 "slide"        // none, slide, drop, scale
//                ,
//                fxSpeed_open:           750
//                ,
//                fxSpeed_close:          1500
//                ,
//                fxSettings_open:        {
//                    easing: "easeInQuint"
//                }
//                ,
//                fxSettings_close:        {
//                    easing: "easeOutQuint"
//                }
//            }

            return $.extend({}, defaults, _options.settings);

        }
    }
}