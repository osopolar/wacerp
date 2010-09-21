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