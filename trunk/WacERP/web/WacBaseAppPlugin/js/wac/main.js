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
 * Wac global system variable object, init wac app environment and provides convenient methods
 */
var Wac = {
//    debug: false,
    debug: true,

    init: function(){
//        this.log("wac app init: ");
        this.setupModuleData();
        this.setupI18nData();
//        this.showBrowserInfo();
    },

    showBrowserInfo: function(){
        $.each($.browser, function(i, val) {
            console.log(i + ":" + val);
        });
    },

    setupI18nData: function(){
        // This will initialize the plugin
        $.i18n.properties({
            name:'',
            path: WacAppConfig.baseUrl + 'wacI18n/getTransForJS/culture/',
            mode:'map',
            language:WacAppConfig.culture,
            callback: function() {
                // We specified mode: 'both' so translated values will be
                // available as JS vars/functions and as a map

//           Wac.log($.i18n.prop('please select one permission at least!'));
                // Accessing a simple value through the map
//                $.i18n.prop('msg_hello');
                // Accessing a value with placeholders through the map
//                $.i18n.prop('msg_complex', ['John']);

                // Accessing a simple value through a JS variable
//                alert(msg_hello +' '+ msg_world);
//                // Accessing a value with placeholders through a JS function
//                alert(msg_complex('John'));
            }
        });
    },

    setupModuleData: function(){
        if((WacEntity.module !== undefined) && (WacAppConfig.module !== undefined )){
            WacEntity.module.list = WacAppConfig.module;
        }
//        Wac.log("WacEntity.module.list:");
//        Wac.log(WacEntity);
    },

    log: function(msg, enable){
        enable = (enable === undefined) ? true : enable;
        if(this.debug){
            if(!$.browser.msie && window.console && window.console.log){
                if(typeof(msg)=='string') {
                    return enable ? window.console.log("debugLog: " + msg) : null;
                }
                else{
                    return enable ? window.console.log(msg) : null;
                }
            }
            else
            {
                 return enable ? alert(msg) : null;
            }
        }
//                console.log($.browser.version);
//                window.console.log(enable);
//                window.console.log(msg);
        return null;

    //    if($("#debugDiv").length == 0)
    //    {
    //        $("body").append("<div id='debugDiv' class='code'></div>");
    //    }
    //    $("#debugDiv")[0].innerHTML = msg;
    }    
}

$(document).ready(function(){
    // invoke init method to initiate wac app
    Wac.init();
})