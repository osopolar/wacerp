/*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

/********   Notes:  *******
 *  
 */

/***** init section, begin *****/
$(document).ready(
    function(){
        init();
        bindEvents();

        function init(){
            Wac.log("dataExportWidget");
        }

        function bindEvents(){
            $(document).hear("#wacAppController", WacAppConfig.event.app_wac_events_show_data_export_form, function ($self, data) {  // listenerid, event name, callback
//                var params = $.extend({dataFormat :WacEntity.extraParam.dataFormat}, data);
//                params.searchField = "name";  // this is a special case, for the name is code on table guardgroup
//                $(moduleListId).jqGrid('setGridParam',{postData:params});
//                $(moduleListId).trigger("reloadGrid");
                Wac.log(data);
            });


        }
    }
);


/**************  interaction section, end  ***************/