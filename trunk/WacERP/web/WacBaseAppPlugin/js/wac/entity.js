/*
 *  declare global WacEntity object varible
 */

var WacEntity = {
    module: new WacModule(),
    operationStatus: new WacOperationStatus(),
    ajaxData: new WacAjaxData(),
    formInputMode: new WacFormInputMode(),
    formStatus: new WacFormStatus(),
    jsonReader: new WacJsonReader(),
    extraParam: new WacExtraParams()

//  modelObj        = new WacModel();
//  openTabs        = new WacOpenTabs();
}
//var wacModule          = new WacModule();
//var wacOperationStatus = new WacOperationStatus();
//var wacAjaxData        = new WacAjaxData();
//var wacFormInputMode   = new WacFormInputMode();
//var wacFormStatus      = new WacFormStatus();
//var wacModelObj        = new WacModel();
//var wacOpenTabs        = new WacOpenTabs();


/******************     wac class declaration     *******************/
/*
 *  declare wac modules model class
 */
function WacModule(){
    var _self = this;
    var _tag = "t";
    this._list = {
        wacGuardUser : {uiPanelId: _tag+"23002", moduleName:"wacGuardUser"},
        wacGuardGroup : {uiPanelId: _tag+"23003", moduleName:"wacGuardGroup"},
        wacGuardPermission : {uiPanelId: _tag+"23004", moduleName:"wacGuardPermission"}
    }

    this.getUiPanelId = function(name){
        return _self._list[name].uiPanelId;
    }
}

/*
 *  declare wac ajax action implemention status
 */
function WacOperationStatus()
{
    this.succss = "0000";
    this.error  = "0001";
    this.processing  = false;
}

/*
 *  declare wac ajax action implemention status
 */
function WacFormStatus()
{
    this.notsave     = "0";
    this.init        = "1";
    this.processing  = "2";
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

/*
 *  jsonReader for jqGrid
 */
function WacJsonReader()
{
    this.root  = "items";
    this.page  = "currentPage";
    this.total = "totalPages";
    this.records  = "totalRecords";
    this.userdata = "userdata";
    this.id    = "id";
    this.repeatitems = false;
}

/*
 *  extraParams for jqGrid
 */
function WacExtraParams()
{
    this.dataFormat = "json";
}