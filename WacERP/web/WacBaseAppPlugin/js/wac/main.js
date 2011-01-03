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
        this.log("wac app init: ");
        this.setupI18n();
    },

    setupI18n: function(){
        // This will initialize the plugin
        Wac.log($(window.location).attr("hostname"));
        $.i18n.properties({
            name:'',
            path: BASE_URL + 'wacI18n/index/lang/',
            mode:'both',
            language:'zh_CN',
            callback: function() {
                // We specified mode: 'both' so translated values will be
                // available as JS vars/functions and as a map

                // Accessing a simple value through the map
                $.i18n.prop('msg_hello');
                // Accessing a value with placeholders through the map
                $.i18n.prop('msg_complex', ['John']);

                // Accessing a simple value through a JS variable
                alert(msg_hello +' '+ msg_world);
                // Accessing a value with placeholders through a JS function
                alert(msg_complex('John'));
            }
        });
    },
    log: function(msg, enable){
        enable = (enable === undefined) ? true : enable;
        if(this.debug){
            if(!$.browser.msie && window.console && window.console.log){
                //        console.log($.browser.version);
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

        return null;


    //    if($("#debugDiv").length == 0)
    //    {
    //        $("body").append("<div id='debugDiv' class='code'></div>");
    //    }
    //    $("#debugDiv")[0].innerHTML = msg;
    }    
}

// invoke init method to initiate wac app
Wac.init();