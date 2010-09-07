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
 */
(function($) {
    //
    // plugin definition
    //

    $.wac = {
        hilight: function(options) {
            debug(this);

            var defaults = {
                foreground: 'red',
                background: 'yellow'
            };
            // build main options before element iteration
            var opts = $.extend({}, defaults, options);
            // iterate and reformat each matched element
            return this.each(function() {
                $this = $(this);
                // build element specific options
                var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
                // update element styles
                $this.css({
                    backgroundColor: o.background,
                    color: o.foreground
                });
                var markup = $this.html();
                // call our format function
                markup = format(markup);
                $this.html(markup);
            });
        }
        ,
        format: function(txt) {
            return '<strong>' + txt + '</strong>';
        }
        ,
        debug: function($obj) {
            if (window.console && window.console.log)
                window.console.log('hilight selection count: ' + $obj.size());
        }
    };

    $.fn.wac = function (opts) {
        return this.each(function() {
            var conf = $.extend({},opts);
            if(tree_component.inst && tree_component.inst[$(this).attr('id')])
                tree_component.inst[$(this).attr('id')].destroy();
            if(conf !== false) new tree_component().init(this, conf);
        });
    };


})(jQuery);