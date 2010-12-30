var wacOperationStatus = new WacOperationStatus();
var wacAjaxData        = new WacAjaxData();
var wacFormInputMode   = new WacFormInputMode();
var wacFormStatus      = new WacFormStatus();
//var wacModelObj        = new WacModel();
//var wacOpenTabs        = new WacOpenTabs();

/******************     wac class declaration     *******************/
/*
 *
 */
function WacFormPrototype()
{
    this.bindEvents = function(){
        Wac.log("bindEvents");
    };

    this.initDialog = function(){
        Wac.log("initDialog");
    };

    this.initForm = function(){
        Wac.log("initForm");
    };

    this.initFormData = function(){
        Wac.log("initFormData");
    };

    this.initFormDataCallBack = function(jsonData){
        Wac.log("initFormDataCallBack");
    };

    this.setupDefaults = function(){
        Wac.log("setupDefaults");
    };

    this.openMainForm = function(){
        Wac.log("openMainForm");
    };

    this.validateMainForm = function(){
        Wac.log("validateMainForm");
    };

    this.submitMainForm = function(){
        Wac.log("submitMainForm");
    };

    this.submitMainFormCallBack = function(jsonData){
        Wac.log("submitMainFormCallBack");
    };
}


/*
 *  declare wac ajax action implemention status
 */
function WacOperationStatus()
{
    this.Succss = "0000";
    this.Error  = "0001";
    this.Processing  = false;
}

/*
 *  declare wac ajax action implemention status
 */
function WacFormStatus()
{
    this.notsave     = "0";
    this.init        = "1";
    this.Processing  = "2";
    this.audited     = "3";
    this.finish      = "100";
}

/*
 *  temporary store ajax data
 */
function WacAjaxData()
{
    this.response = {};
}

/*
 * declare open tabs related objs
 */
function WacOpenTabs()
{
    this.appStorehouseTabs = [];
    this.appSysTabs = [];
}

/*
 *  form input mode
 */
function WacFormInputMode()
{
    this.add   = 'c';
    this.read  = 'r';
    this.edit  = 'u';
    this.del   = 'd';
    this.audit = 'a';
}
