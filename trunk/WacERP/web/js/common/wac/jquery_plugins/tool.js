/*
 * wac jquery extension
 * http://www.WebApp-China.com/
 *
 * Copyright (c) 2010 JianBinBi (WebApp-China.com)
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
    Wac.Tool = function(element, options)
    {
        // Private members
        var elem = $(element);
        var settings = $.extend({}, options || {});

        return {  // declare public methods
            dumpObj: function(obj, options){
                var defaults = {name:"Object", indent:"", depth:5};
                var opts = $.extend({}, defaults, options);
                
                Wac.log(_dumpObj(obj, opts.name, opts.indent, opts.depth));
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
        
        /*
             * Usage:
             * dumpObj(data,'<br/>','property:',5)
             */
        function _dumpObj(obj, name, indent, depth){
            var MAX_DUMP_DEPTH = 10;
            if (depth > MAX_DUMP_DEPTH) {
                return indent + name + ": <Maximum Depth Reached>\n";
            }

            if (typeof obj == "object") {
                var child = null;
                var output = indent + name + "\n";
                indent += " \t";
                for (var item in obj)
                {
                    try {
                        child = obj[item];
                    } catch (e) {
                        child = "<Unable to Evaluate>";
                    }
                    if (typeof child == "object") {
                        output += _dumpObj(child, item, indent, depth + 1);
                    } else {
                        output += indent + item + ": " + child + "\n";
                    }
                }
                return output;
            } else {
                return obj;
            }
        }

        // Private methods
        function _privateMethod() {
            Wac.log("This is a private method!");
        }
    };

    $.fn.wacTool = function(options)
    {
        return $.fn.encapsulatedPlugin('wacTool', Wac.Tool, this, options);
    };

})(jQuery);