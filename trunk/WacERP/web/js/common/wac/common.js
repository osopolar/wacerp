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

/******************     wac methods declaration     *******************/
function wacInitUIBtn(){
    //all hover and click logic for buttons
    $(".fg-button:not(.ui-state-disabled)")
    .hover(
        function(){
            $(this).addClass("ui-state-hover");
        },
        function(){
            $(this).removeClass("ui-state-hover");
        }
        )
    .mousedown(function(){
        $(this).parents('.fg-buttonset-single:first').find(".fg-button.ui-state-active").removeClass("ui-state-active");
        if( $(this).is('.ui-state-active.fg-button-toggleable, .fg-buttonset-multi .ui-state-active') ){
            $(this).removeClass("ui-state-active");
        }
        else {
            $(this).addClass("ui-state-active");
        }
    })
    .mouseup(function(){
        if(! $(this).is('.fg-button-toggleable, .fg-buttonset-single .fg-button,  .fg-buttonset-multi .fg-button') ){
            $(this).removeClass("ui-state-active");
        }
    });
};


/*
 *  
 */
function wacOpenModuleForm(moduleFormName, moduleName, rowid)
{
    wacModelObj.productionOrder = $("#" + moduleName +"List").getRowData(rowid);
//    console.log(moduleFormName + ":" + moduleName + ":" + rowid);
//    console.log(wacModelObj.productionOrder.id + ":" + wacModelObj.productionOrder.name);
//    console.log($(wacModelObj.productionOrder).dump());
    
//    productionOrderFormExternalCall();
    $('#'+moduleFormName).dialog('open');
    
}

/*
 * show loading
 */
function wacShowBlockUILoading(id, msg)
{
    if(msg === undefined){
        var msg = "数据加载中...";
    }

    if(id === undefined)
    {
        $.blockUI({message: '<h3><img src="/images/js_icons/throbber.gif" alt="' + msg +'"> ' + msg +'</h3>'});
    }
    else
    {
        $(id).block({message: '<h3><img src="/images/js_icons/throbber.gif" alt="' + msg +'"> ' + msg +'</h3>'});
    }
}

/*
 * show loading
 */
function wacShowPortletLoading(id, msg)
{
    if(msg === undefined){
        var msg = "刷新中...";
    }

    $(id).block({message: '<h3><img src="/images/js_icons/throbber.gif" alt="' + msg +'"> ' + msg +'',
                 css: {border: 'none',  backgroundColor: '#000', opacity: .5}});
}

/*
 * hide blockUI
 */
function wacHideBlockUI(id)
{
    if(id === undefined)
    {
        $.unblockUI();
    }
    else
    {
        $(id).unblock();
    }
    
}

/*
 * show tips
 */
function wacShowTips(msg, title)
{
    if(title != undefined)
    {
        $("#dynamicZone").append("<div id='wacTipsDialog' title='" + title + "'><p>" + msg +"</p></div>");
    }
    else
    {
        $("#dynamicZone").append("<div id='wacTipsDialog' title='信息提示'><p>" + msg +"</p></div>");
    }

    $("#wacTipsDialog").dialog({
        bgiframe: true,
        modal: true,
        width: 400,
        zIndex: 100,
        buttons: {
            Ok: function() {
                $(this).dialog('close');
                $("#wacTipsDialog").remove();
            }
        }
    });
}

/*
 * confirm win
 */
function wacConfirmDialog(callbackObj, orderId, msg, title)
{
    if(msg != undefined)
    {
        $("#dynamicZone").append("<div id='wacConfirmDialog' title='确认提示'><p>" + msg +"</p></div>");
    }
    else
    {
        $("#dynamicZone").append("<div id='wacConfirmDialog' title='确认提示'><p>确认进行该操作?</p></div>");
    }

    $("#wacConfirmDialog").dialog({
        bgiframe: true,
        resizable: false,
        height:140,
        modal: true,
        overlay: {
            backgroundColor: '#000',
            opacity: 0.5
        },
        buttons: {
            '取消': function() {
                $(this).dialog('close');
                $("#wacConfirmDialog").remove();
            },
            '确认': function() {
                callbackObj.run(orderId);
                $(this).dialog('close');
                $("#wacConfirmDialog").remove();
            }
        }
    });
}

function wacPopupWindow(winName, urlPath,width,height){
    popWin=window.open(urlPath, winName, 'width='+width+', height='+height+', top=0, left=50, location=no, directories=no, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, status=no');
    if(typeof(popWin)=="object"){
        popWin.focus();
        popWin.moveTo(screen.availWidth/10,90);
    }
}

function wacWinClose()
{
    window.close();
}

function wacRedirect(urlPath, target){ // go to target url
    if(target===undefined){
        $(document).attr('location', urlPath);
    }
    else{
        eval(target+".location='"+urlPath+"'");
    }  
}

// register error function when ajax false
function wacRegisterAjaxErrorTips()
{
    $('<div id="divAjaxResult"></div>').appendTo('body');
    $("#divAjaxResult").ajaxError(function(evt, request, settings) {
        alert("ajax error: \n" + settings.url);
    })
//        $("#divAjaxResult").ajaxError(function(evt, request, settings) { alert("error"); $(this).append('<div>ajax error: \n' + settings.url + '</div>'); })
}

function wacTriggerSearch(evt, moduleListId, searchField)
{
    if(evt.keyCode==13)
    {
        var srcEl = evt.srcElement || evt.target;
//        wacDebugLog($(srcEl).val());
        var params = {dataFormat :"json",
                      searchOper :"cn",
                      searchField : searchField,
                      searchString : $(srcEl).val()
                     };
//        $("#" + moduleListId).jqGrid('setGridParam',{url: BASE_URL+"test/ajaxTest"})
        $("#" + moduleListId).jqGrid('setGridParam',{postData:params});
        $("#" + moduleListId).trigger("reloadGrid");
    }    
}

function wacParseDate(str){
    if(typeof str == 'string'){
        var results = str.match(/^ *(\d{4})-(\d{1,2})-(\d{1,2}) *$/);
        if(results && results.length>3)
            return new Date(parseInt(results[1]),parseInt(results[2]) -1,parseInt(results[3]));
        results = str.match(/^ *(\d{4})-(\d{1,2})-(\d{1,2}) +(\d{1,2}):(\d{1,2}):(\d{1,2}) *$/);
        if(results && results.length>6)
            return new Date(parseInt(results[1]),parseInt(results[2]) -1,parseInt(results[3]),parseInt(results[4]),parseInt(results[5]),parseInt(results[6]));
        results = str.match(/^ *(\d{4})-(\d{1,2})-(\d{1,2}) +(\d{1,2}):(\d{1,2}):(\d{1,2})\.(\d{1,9}) *$/);
        if(results && results.length>7)
            return new Date(parseInt(results[1]),parseInt(results[2]) -1,parseInt(results[3]),parseInt(results[4]),parseInt(results[5]),parseInt(results[6]),parseInt(results[7]));
    }
    return null;
}

function wacFormatDate(v){
  if(typeof v == 'string') v = wacParseDate(v);
  if(v instanceof Date){
    var y = v.getFullYear();
    var m = v.getMonth() + 1;
    var d = v.getDate();
    var h = v.getHours();
    var i = v.getMinutes();
    var s = v.getSeconds();
    var ms = v.getMilliseconds();
//    if(ms>0) return y + '-' + m + '-' + d + ' ' + h + ':' + i + ':' + s + '.' + ms;
    if(ms>0) return y + '年' + m + '月' + d + '日'+ ' ' + h + ':' + i + ':' + s + '.' + ms;
    if(h>0 || i>0 || s>0) return y + '-' + m + '-' + d + ' ' + h + ':' + i + ':' + s;
//    return y + '-' + m + '-' + d;
    return y + '年' + m + '月' + d + '日';
  }
  return '';
}

function wacDebugLog(msg)
{
//    if(!$.browser.msie){
////        console.log($.browser.version);
//        console.log(msg);
//    }
//    else
//    {
//      alert(msg);
//    }

//    if($("#debugDiv").length == 0)
//    {
//        $("body").append("<div id='debugDiv' class='code'></div>");
//    }
//    $("#debugDiv")[0].innerHTML = msg;
}

