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
    if(!$.browser.msie && window.console && window.console.log){
    //        console.log($.browser.version);
                window.console.log(msg);
    }
    else
    {
      alert(msg);
    }

//    if($("#debugDiv").length == 0)
//    {
//        $("body").append("<div id='debugDiv' class='code'></div>");
//    }
//    $("#debugDiv")[0].innerHTML = msg;
}


/**
 *	debugData
 *
 *	Pass me a data structure {} and I'll output all the key/value pairs - recursively
 *
 *	@example var HTML = debugData( oElem.style, "Element.style", { keys: "top,left,width,height", recurse: true, sort: true, display: true, returnHTML: true });
 *
 *	@param Object	o_Data   A JSON-style data structure
 *	@param String	s_Title  Title for dialog (optional)
 *	@param Hash		options  Pass additional options in a hash
 */
function debugData (o_Data, s_Title, options) {
    options = options || {};
    var
    str=s_Title || 'DATA'
    //	maintain backward compatibility with OLD 'recurseData' param
    ,	recurse=(typeof options=='boolean' ? options : options.recurse !==false)
    ,	keys=(options.keys?','+options.keys+',':false)
    ,	display=options.display !==false
    ,	html=options.returnHTML !==false
    ,	sort=options.sort !==false
    ,	D=[], i=0 // Array to hold data, i=counter
    ,	hasSubKeys = false
    ,	k, t, skip, x	// loop vars
    ;
    if (o_Data.jquery) {
        str=(s_Title ? s_Title+'\n':'')+'jQuery Collection ('+ o_Data.length +')\n    context="'+ o_Data.context +'"';
    }
    else if (o_Data.tagName && typeof o_Data.style == 'object') {
        str=(s_Title ? s_Title+'\n':'')+o_Data.tagName;
        var id = o_Data.id, cls=o_Data.className, src=o_Data.src, hrf=o_Data.href;
        if (id)  str+='\n    id="'+		id+'"';
        if (cls) str+='\n    class="'+	cls+'"';
        if (src) str+='\n    src="'+	src+'"';
        if (hrf) str+='\n    href="'+	hrf+'"';
    }
    else {
        parse(o_Data,''); // recursive parsing
        if (sort && !hasSubKeys) D.sort(); // sort by keyName - but NOT if has subKeys!
        str+='\n***'+'****************************'.substr(0,str.length);
        str+='\n'+ D.join('\n'); // add line-breaks
    }

    if (display) alert(str); // display data
    if (html) str=str.replace(/\n/g, ' <br>').replace(/  /g, ' &nbsp;'); // format as HTML
    return str;

    function parse ( data, prefix ) {
        if (typeof prefix=='undefined') prefix='';
        try {
            $.each( data, function (key, val) {
                k = prefix+key+':  ';
                skip = (keys && keys.indexOf(','+key+',') == -1);
                if (typeof val=='function') { // FUNCTION
                    if (!skip) D[i++] = k +'function()';
                }
                else if (typeof val=='string') { // STRING
                    if (!skip) D[i++] = k +'"'+ val +'"';
                }
                else if (typeof val !='object') { // NUMBER or BOOLEAN
                    if (!skip) D[i++] = k + val;
                }
                else if (isArray(val)) { // ARRAY
                    if (!skip) D[i++] = k +'[ '+ val.toString() +' ]'; // output delimited array
                }
                else if (val.jquery) {
                    if (!skip) D[i++] = k +'jQuery ('+ val.length +') context="'+ val.context +'"';
                }
                else if (val.tagName && typeof val.style == 'object') {
                    var id = val.id, cls=val.className, src=val.src, hrf=val.href;
                    if (skip) D[i++] = k +' '+
                        id  ? 'id="'+	id+'"' :
                        src ? 'src="'+	src+'"' :
                        hrf ? 'href="'+	hrf+'"' :
                        cls ? 'class="'+cls+'"' :
                        '';
                }
                else { // Object or JSON
                    if (!recurse || !hasKeys(val)) { // show an empty hash
                        if (!skip) D[i++] = k +'{ }';
                    }
                    else { // recurse into JSON hash - indent output
                        D[i++] = k +'{';
                        parse( val, prefix+'    '); // RECURSE
                        D[i++] = prefix +'}';
                    }
                }
            });
        } catch (e) {}
        function isArray(o) {
            return (o && typeof o==='object' && !o.propertyIsEnumerable('length') && typeof o.length==='number');
        }
        function hasKeys(o) {
            var c=0;
            for (x in o) c++;
            if (!hasSubKeys) hasSubKeys = !!c;
            return !!c;
        }
    }
};

/**
* showOptions
*
* Pass a layout-options object, and the pane/key you want to display
*/
function showOptions (o_Settings, key) {
    var data = o_Settings.options;
    $.each(key.split("."), function() {
        data = data[this]; // resurse through multiple levels
    });
    debugData( data, 'options.'+key );
}

/**
* showState
*
* Pass a layout-options object, and the pane/key you want to display
*/
function showState (o_Settings, key) {
    debugData( o_Settings.state[key], 'state.'+key );
}

