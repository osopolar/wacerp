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
            },
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
            },
            showBlockUI: function(id)
            {
                $.blockUI({
                    message: $(id),
                    css: {
                        top: '5px',
                        left: '10px',
                        width: '98%',
                        cursor: null
                    }
                });
            },
            showBlockUILoading: function(id, msg)
            {
                if(msg === undefined){
                    var msg = $.i18n.prop('data loading...');
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
            },
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
            },
            showTips: function(msg, title)
            {
                if(title != undefined)
                {
                    $("body").append("<div id='wacTipsDialog' title='" + title + "'><p>" + msg +"</p></div>");
                }
                else
                {
                    $("body").append("<div id='wacTipsDialog' title='"+ $.i18n.prop('Tips') +"'><p>" + msg +"</p></div>");
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
            },
            isEmpty: function(str){
                return (str == null) || (str.length == 0);
            },
            isEmail: function(str){
                if(isEmpty(str)) return false;
                var re = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i
                return re.test(str);
            },
            isAlpha: function(str){
                var re = /[^a-zA-Z]/g
                if (re.test(str)) return false;
                return true;
            },
            isNumeric: function(str){
                var re = /[\D]/g
                if (re.test(str)) return false;
                return true;
            },
            isAlphaNumeric: function(str){
                var re = /[^a-zA-Z0-9]/g
                if (re.test(str)) return false;
                return true;
            },
            isLength: function(str, len){
                return str.length == len;
            },
            isLengthBetween: function(str, min, max){
                return (str.length >= min)&&(str.length <= max);
            },
            isPhoneNumber: function(str){
                var re = /^\(?[2-9]\d{2}[\)\.-]?\s?\d{3}[\s\.-]?\d{4}$/
                return re.test(str);
            },
            isDate: function(str){
                var re = /^(\d{1,2})[\s\.\/-](\d{1,2})[\s\.\/-](\d{4})$/
                if (!re.test(str)) return false;
                var result = str.match(re);
                var m = parseInt(result[1]);
                var d = parseInt(result[2]);
                var y = parseInt(result[3]);
                if(m < 1 || m > 12 || y < 1900 || y > 2100) return false;
                if(m == 2){
                    var days = ((y % 4) == 0) ? 29 : 28;
                }else if(m == 4 || m == 6 || m == 9 || m == 11){
                    var days = 30;
                }else{
                    var days = 31;
                }
                return (d >= 1 && d <= days);
            },
            is18YearOld: function(str){
                var re = /^(\d{1,2})[\s\.\/-](\d{1,2})[\s\.\/-](\d{4})$/
                if (!re.test(str)) return false;
                var result = str.match(re);
                var d = parseInt(result[1].replace(/^0+/g, ''));
                var m = parseInt(result[2].replace(/^0+/g, ''));
                var y = parseInt(result[3].replace(/^0+/g, ''));
                var currentTime = new Date();

                if((currentTime.getFullYear() - y)>18 ){
                    return true;
                }

                if(((currentTime.getFullYear() - y)==18) && (currentTime.getMonth()>(m-1) ) ){
                    return true;
                }

                if(((currentTime.getFullYear() - y)==18) && (currentTime.getMonth()==(m-1)) && (currentTime.getDate()>=d) ){
                    return true;
                }

                return false;
            },
            isMatch: function(str1, str2){
                return str1 == str2;
            },
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