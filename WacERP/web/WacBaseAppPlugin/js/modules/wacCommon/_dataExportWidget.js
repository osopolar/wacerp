/*****  Component, by Ben Bi <prince.bi@gmail.com>  created at: 12/23/2009 4:10:45 PM  *****/

/********   Notes:  *******
 *  
 */



/***** variables declartion section, begin *****/

/***** variables declartion section, end *****/

/***** init section, begin *****/
$(document).ready(
    function(){
//        var wacGuardUserForm = new WacGuardUserForm();
//
//        wacGuardUserForm.initDialog();
//        wacGuardUserForm.initForm();
//        wacGuardUserForm.bindEvents();
//
////        Wac.log($(document).hear("wacGuardUserForm", "show-add-form", function ($self, data) {}));
//
//        $(document).hear("wacGuardUserForm", "show-add-form", function ($self, data) {  // listenerid, event name, callback
//            Wac.log("wacGuardUserForm:" + data);
////            Wac.log(jQuery._jq_shout.registry);
//        });

        
        init();
        bindEvents();

        function init(){
            Wac.log("dataExportWidget");
        }

        function bindEvents(){
            $(document).hear("#wacAppController", "show-add-form", function ($self, data) {  // listenerid, event name, callback
            Wac.log(data);
//            Wac.log(jQuery._jq_shout.registry);
        });
        }
    }
);


/**************  interaction section, end  ***************/