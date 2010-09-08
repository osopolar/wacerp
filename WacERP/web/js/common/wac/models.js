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
function WacModel()
{
    this.productionOrder = {};
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
    this.add  = 0;
    this.edit = 1;
}
