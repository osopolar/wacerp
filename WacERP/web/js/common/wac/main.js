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
    debug: true,

    log: function(msg){
        if(this.debug){
            if(!$.browser.msie && window.console && window.console.log){
                //        console.log($.browser.version);
                window.console.log(msg);
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
 *
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
            //        $(document).wacTool().dumpObj(settings);
            return _instance;
        }
        ,
        getUiLayout: function()
        {
            return _instance;
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

            return $.extend({}, defaults, _options.settings);

        }
    }
}