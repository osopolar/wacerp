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