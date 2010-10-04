/*
 * wac jquery extension
 * http://www.WebAppClub.com/
 *
 * Copyright (c) 2010 JianBinBi (WebAppClub.com)
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * Package wac
 * Class Tool
 *
 * Date: 2010-09-07
 *
 * the plugin js template come from http://jamietalbot.com/2010/08/26/object-oriented-jquery-plugins-mk-2/
 *
 */
(function($) {
    // Wac namespace object already defined at wac/plugin_base.js
    Wac.Page = function(element, options)
    {
        // Private members
        var elem = $(element);
        var settings = $.extend({}, options || {});

        return {  // declare public methods
            redirect: function(options) {
                if(options.target===undefined){
                    $(document).attr('location', options.url);
                }
                else{
                    eval(options.target+".location='"+options.url+"'");
                }
            }
            ,
            initUIBtn: function(){
                //all hover and click logic for buttons
                $(".fg-button:not(.ui-state-disabled)")
                .hover(
                    function(){
                        $(this).addClass("ui-state-hover");
                    },
                    function(){
                        $(this).removeClass("ui-state-hover");
                    }
                    )
                .mousedown(function(){
                    $(this).parents('.fg-buttonset-single:first').find(".fg-button.ui-state-active").removeClass("ui-state-active");
                    if( $(this).is('.ui-state-active.fg-button-toggleable, .fg-buttonset-multi .ui-state-active') ){
                        $(this).removeClass("ui-state-active");
                    }
                    else {
                        $(this).addClass("ui-state-active");
                    }
                })
                .mouseup(function(){
                    if(! $(this).is('.fg-button-toggleable, .fg-buttonset-single .fg-button,  .fg-buttonset-multi .fg-button') ){
                        $(this).removeClass("ui-state-active");
                    }
                });
            }
            ,
            showBlockUILoading: function(id, msg)
            {
                if(msg === undefined){
                    var msg = "数据加载中...";
                }

                if(id === undefined)
                {
                    $.blockUI({
                        message: '<h3><img src="/images/common/js_icons/throbber.gif" alt="' + msg +'"> ' + msg +'</h3>'
                        });
                }
                else
                {
                    $(id).block({
                        message: '<h3><img src="/images/common/js_icons/throbber.gif" alt="' + msg +'"> ' + msg +'</h3>'
                        });
                }
            }
            ,
            hideBlockUI: function(id)
            {
                if(id === undefined)
                {
                    $.unblockUI();
                }
                else
                {
                    $(id).unblock();
                }
            }
            ,
            showTips: function(msg, title)
            {
                if(title != undefined)
                {
                    $("body").append("<div id='wacTipsDialog' title='" + title + "'><p>" + msg +"</p></div>");
                }
                else
                {
                    $("body").append("<div id='wacTipsDialog' title='信息提示'><p>" + msg +"</p></div>");
                }

                $("#wacTipsDialog").dialog({
                    bgiframe: true,
                    modal: true,
                    width: 400,
                    zIndex: 100,
                    buttons: {
                        Ok: function() {
                            $(this).dialog('close');
                            $("#wacTipsDialog").remove();
                        }
                    }
                });
            }
            ,
            test: function(options) {
                var defaults = {};
                
                // build main options before element iteration
                var opts = $.extend({}, defaults, options);
                
                Wac.log(options);
                Wac.log(elem);
                _privateMethod();
                return true;
            }
        };


        // Private methods
        function _privateMethod() {
            Wac.log("This is a private method!");
        }
    };

    $.fn.wacPage = function(options)
    {
        return $.fn.encapsulatedPlugin('wacPage', Wac.Page, this, options);
    };

})(jQuery);