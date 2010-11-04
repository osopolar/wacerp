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
 * Class Foo
 *
 * Date: 2010-09-07
 *
 * the plugin js template come from http://jamietalbot.com/2010/08/26/object-oriented-jquery-plugins-mk-2/
 *
 */
(function($) {
    // Wac namespace object already defined at wac/plugin_base.js
    Wac.Foo = function(element, options)
    {
        // Private members
        var elem = $(element);
        var settings = $.extend({}, options || {});
        var _result;

        // Private methods
        function _privateMethod() {
            console.log("This is a private method!");
        }

        return {
            myMethod: function(options){
                
            }
            ,
            isAlpha: function(str){
                var re = /[^a-zA-Z]/g
                if (re.test(str)) return false;
                return true;
            }
            ,
            isEmail: function(str){
                if(isEmpty(str)) return false;
                var re = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i
                _result = re.test(str);
                return _result;
            }
            ,
            
            getSize: function(size) {
                return size;
            },
            debug: function(options) {
                var defaults = {};
                
                // build main options before element iteration
                var opts = $.extend({}, defaults, options);
                
                console.log(options);
                console.log(elem);
                _privateMethod();
                return true;
            }
        };
    };

    $.fn.wacFoo = function(options)
    {
        return $.fn.encapsulatedPlugin('wacFoo', Wac.Foo, this, options);
    };

})(jQuery);