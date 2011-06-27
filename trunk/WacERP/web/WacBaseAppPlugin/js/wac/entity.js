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
    extraParam: new WacExtraParams(),
    jqGridMetas: new JqGridMetas(),
    jqGridFormatter: new JqGridFormatter()

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

    this.list = null;  // this list is declared at main.js setupModuleData method

    this.getUiPanelId = function(name){
        return (_self.list[name] !== undefined ) ? _self.list[name].uiPanelId : "";
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

/*
 *  JqGridMetas params
 *  the keys are wac standard common datum fields
 */
function JqGridMetas()
{
    this.currentPage  = "page";
    this.totalPages   = "lastpage";
    this.rows         = "rows";
    this.sortName     = "sortname";
    this.sortOrder    = "sord";
    this.sidx         = "sidx";
    this.searchField  = "searchField";
    this.searchOper   = "searchOper";
    this.searchString = "searchString";

}

function JqGridFormatter()
{
   this.availFormatter = function(cellvalue, options, rowObject)
   {
     return (cellvalue == '1') ? $.i18n.prop("Yes") : $.i18n.prop("No");
   };

   this.availUnformatter = function(cellvalue, options, rowObject)
   {
     return (cellvalue == $.i18n.prop("Yes")) ? "1" : "0";
   }
}