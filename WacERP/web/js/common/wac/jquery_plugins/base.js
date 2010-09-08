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
 * Date: 2010-09-07
 *
 * the plugin js template come from http://jamietalbot.com/2010/08/26/object-oriented-jquery-plugins-mk-2/
 *
 */

var Wac = Wac || {};  // global package for wac
(function($) {
    $.fn.encapsulatedPlugin = function(plugin, definition, objects, options) {
        var result = [];

        // Iterates through the set calling the specified function.
        function makeIteratorFunction(f, set) {
            return function() {
                for ( var i = 0; i < set.length; i++) {
                    set[i][f].apply(set[i][f], arguments);
                }
            };
        }
        
        objects.each(function() {
            var element = $(this);

            if (!element.data(plugin)) {
                // Initialise
                var instance = new definition(this, options);

                // Store the new functions in a validation data object.
                element.data(plugin, instance);
            }
            result.push(element.data(plugin));
        });

        // We now have a set of plugin instances.
        result = $(result);

        // Take the public functions from the definition and make them available across the set.
        var template = result[0];
        if (template) {
            for ( var i in template) {
                if (typeof (template[i]) == 'function') {
                    result[i] = makeIteratorFunction(i, result);
                }
            }
        }
        // Finally mix-in a convenient reference back to the objects, to allow for chaining.
        result.$ = objects;
        return result;
    };

})(jQuery);