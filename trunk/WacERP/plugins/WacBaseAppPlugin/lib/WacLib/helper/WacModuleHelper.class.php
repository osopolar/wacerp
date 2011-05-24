<?php
/**
 * Description of WacModuleHelper
 *
 * @author ben
 *
 *
 */
class WacModuleHelper
{
    protected static $_instance;
    
//     * declare:
//     * buttons = bv+ba+sa+be+de+ce
//     * bv: button view/print
//     * ba: button audit
//     * sa: button add subitems
//     * be: button edit
//     * de: button delete
//     * ce: button cancel
//     * se: button save
    public static $ctlBtns = array('bv','ba','sa','be','de','ce','se');
    
    public static function getInstance()
    {
        $class = __CLASS__;
        if(is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __construct()			// construct method
    {
        ;
    }

    /*
     * getWidgetId
     */
    public static function getWidgetId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "widget");
    }

    /*
     * getComponentsId
     */
    public static function getComponentsId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "component");
    }

    /*
     * getTreeId
     */
    public static function getTreeId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "tree");
    }

    /*
     * getModuleId
     */
    public static function getModuleGlobalName($module, $attachInfo=array())
    {
         return isset($attachInfo["uiid"]) ? $module."_".$attachInfo["uiid"] : $module;
    }
    
    /*
     * getListingTableId
     */
    public static function getListingTableId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "listingTable");
    }

    /*
     * getFormDialogId
     */
    public static function getFormDialogId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "formDialog");
    }

    /*
     * getNavPanelId
     */
    public static function getNavPanelId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "navPanel");
    }

    /*
     * getPanelId
     */
    public static function getDashboardId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "dashboard");
    }

    /*
     * getPanelId
     */
    public static function getPanelId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "panel");
    }

    /*
     * getFormId
     */
    public static function getFormId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "form");
    }

    public static function getUploadFormId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "form");
    }

    /*
     * getElementId
     */
    public static function getElementId($module, $attachInfo=array(), $element="")
    {
        return isset($attachInfo["uiid"]) ? $element."_".$module.$attachInfo["uiid"] : $element."_".$module;
    }

    /*
     * getSubFormDialogId
     */
    public static function getSubFormDialogId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "subFormDialog");
    }
    /*
     * getSubFormId
     */
    public static function getSubFormId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "subForm");
    }

    /*
     * getPagerId
     */
    public static function getPagerId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "pager");
    }

    /*
     * getListId
     */
    public static function getListId($module, $attachInfo=array())
    {
        return self::getElementId($module, $attachInfo, "list");
    }

    /*
     * generate display col labels
     * @params - jqgrid cols array
     * return string
     */
    public static function generateJqGridDisplayColLabels($cols){
        $str = "";
        if(count($cols)>0){
            $tmpArr = array();
            foreach($cols as $col){
                $tmpArr[]= "'{$col["label"]}'";
            }
            $str.= implode(",\n", $tmpArr).",\n";
        }
        return $str;
    }

    /*
     * generate display col models
     * @params - jqgrid cols array
     * return string
     */
    public static function generateJqGridDisplayColModels($cols){
        $str = "";
        if(count($cols)>0){
            $tmpArr1 = array();
            foreach($cols as $col){
                $tmpArr2 = array();
                foreach($col as $k => $v){
                    if($v !== ""){
                        switch($k){
                            case "sortable":
                            case "editable":
                            case "width":
                            case "formoptions":
                            case "editrules":
                            case "formatter":
                            case "unformat":
                            case "editoptions":
                                $tmpArr2[] = "{$k}:{$v}";
                                break;
                            case "label":
                                break;
                            default:
                                $tmpArr2[] = "{$k}:'{$v}'";
                                break;
                        }
                    }
                }
                $tmpArr1[]= "{".implode(",", $tmpArr2)."}";
            }
            $str.= implode(",\n", $tmpArr1).",\n";
        }
        return $str;
    }

    /*
     * generate hidden fields
     * @params - array objMainModuleTableFields
     * return string
     */
    public static function generateJqGridHiddenFields($arrMainModuleTableFields=array(), $isDetailDeclare=false, $isComma=true)
    {
        if(count($arrMainModuleTableFields)>0) {
            $tmpArr = array();
            $i=0;
            if(!$isDetailDeclare) {
                foreach($arrMainModuleTableFields as $v) {
                    $tmpArr[] = "'hd{$i}'";
                    $i++;
                }
            }
            else
            {
                foreach($arrMainModuleTableFields as $v) {
                    $tmpArr[] = "{name:'".$v."', hidden:true}";
                    $i++;
                }
            }
            return $isComma ? implode(",\n", $tmpArr).",\n" : implode(",\n", $tmpArr)."\n";
        }
        return "";
    }

    /*
     * abstract function for get btn str
     * @params = array(
     *  - tag
     *  - label
     *  - event
     *  - action  (notes: if given action, event action will be replace by action)
     * )
     */
    protected static function getBtnStr($params)
    {
        $str = " {$params['tag']} = ";
        $str.= "\"<button ";
        // id
        $str.= "id=\\\"{$params['tag']}\" + cl +\"_{$params["componentGlobalName"]}\\\" ";
        // class
//        $str.= "text=\\\"false\\\" icons=\\\"{primary: ui-icon-pencil}\\\" ";
        // action
        $str.= "onclick=\\\"javascript:";  //action
        if(isset($params["action"])){
            $str.= $params["action"]."\\\"";
        }
        elseif(isset($params["event"])){
            $str.= "$.shout('{$params["moduleGlobalName"]}{$params["event"]}', {id: \" + cl +\" });\\\"";
        }
        $str.= " >";
        // label
        $str.= $params["label"];
        $str.= "</button>\";\n";

        return $str;
    }

    public static function generateListEditFormBtn($params)
    {
        $_params = array(
            "tag"=>"be", "label"=>__("JqGridBtnEdit"), "event"=>sfConfig::get("app_wac_events_show_edit_form")
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    /*
     * generateListDelFormBtn
     */
    public static function generateListDelFormBtn($params)
    {
        $_params = array(
            "tag"=>"de", "label"=>__("JqGridBtnDel"), 
            "action"=>" $('#".WacModuleHelper::getListingTableId($params["moduleName"], $params["attachInfo"])."').jqGrid('delGridRow', '\"+cl+\"', {url:'\" + delUrl + \"/dataFormat/json/', top: 200, left:500});\\\""
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    /*
     * generateListViewFormBtn
     */
    public static function generateListViewFormBtn($params)
    {
        $actionStr = "$.shout(WacAppConfig.event.app_wac_events_show_data_print_form, {";
        $actionStr .= "moduleName:\'{$params["moduleName"]}\',";
        $actionStr .= "moduleAction:\'view\',";
        $actionStr .= "moduleCaption:\'view\" + cl +\"\' ,";
        $actionStr .= "dataFormat:\'".WacDataFormatType::$htmlEntityView."\',";
        $actionStr .= JqGridDataHelper::$KEY_SEARCH.":\'true\',";
        $actionStr .= JqGridDataHelper::$KEY_SEARCH_FIELD.":\'id',";
        $actionStr .= JqGridDataHelper::$KEY_SEARCH_OPER.":\'eq\',";
        $actionStr .= JqGridDataHelper::$KEY_SEARCH_STRING.":\" + cl +\"";
        $actionStr .= "});";

        $_params = array(
            "tag"=>"bv",
            "label"=>__("JqGridBtnPrint"),
            "action"=>$actionStr
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    public static function generateInlineListEditFormBtn($params)
    {
        $_params = array(
            "tag"=>"be", "label"=>__("JqGridBtnEdit"),
            "action"=>" $('#".WacModuleHelper::getListingTableId($params["moduleName"], $params["attachInfo"])."').jqGrid('editRow', '\"+cl+\"', true, null, {$params["componentGlobalName"]}Callback.save, '\" + editUrl + \"', WacEntity.extraParam);"
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    public static function generateInlineListSaveFormBtn($params)
    {
        $_params = array(
            "tag"=>"se", "label"=>__("JqGridBtnSave"),
            "action"=>" $('#".WacModuleHelper::getListingTableId($params["moduleName"], $params["attachInfo"])."').jqGrid('saveRow', '\"+cl+\"', true, null, {$params["componentGlobalName"]}Callback.save, '\" + editUrl + \"', WacEntity.extraParam, null);"
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    public static function generateInlineListCancelFormBtn($params)
    {
        $_params = array(
            "tag"=>"ce", "label"=>__("JqGridBtnCancel"),
            "action"=>" $('#".WacModuleHelper::getListingTableId($params["moduleName"], $params["attachInfo"])."').jqGrid('restoreRow', '\"+cl+\"');"
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    public static function generateInlineListDelFormBtn($params)
    {
        $_params = array(
            "tag"=>"de", "label"=>__("JqGridBtnDel"),
            "action"=>" $('#".WacModuleHelper::getListingTableId($params["moduleName"], $params["attachInfo"])."').jqGrid('delGridRow', '\"+cl+\"', {url:'\" + delUrl + \"/dataFormat/json/', top: 200, left:500});"
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    /*
     * generateListAuditFormBtn
     */
    public static function generateListAuditFormBtn($params)
    {
        $_params = array(
            "tag"=>"ba", "label"=>__("JqGridBtnAudit"),
            "action"=>" wacConfirmDialog({$params["componentGlobalName"]}AuditAction, '\" + cl +\"');"
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    /*
     * generateListAddSubFormBtn
     */
    public static function generateListAddSubFormBtn($params=array())
    {
        $_params = array(
            "tag"=>"sa", "label"=>__("JqGridBtnAddSubItem"),
            "action"=>" {$params["componentGlobalName"]}OpenModuleForm('".WacModuleHelper::getFormDialogId($params["moduleName"], $params["attachInfo"])."', '{$params["componentGlobalName"]}', '".WacOperationType::$add."' , 0, '\" + cl +\"');"
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    /*
     * generateSubListEditFormBtn
     */
    public static function generateSubListEditFormBtn($params)
    {
        $_params = array(
            "tag"=>"be", "label"=>__("JqGridBtnEdit"),
            "action"=>"\"{$params["componentGlobalName"]}OpenModuleForm('{$params["componentGlobalName"]}FormDialog', '{$params["componentGlobalName"]}', '".WacOperationType::$edit."' , '\"+cl+\"', '\" + row_id +\"');\";\n"
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    /*
     * generateSubListDelFormBtn
     */
    public static function generateSubListDelFormBtn($params)
    {
        $_params = array(
            "tag"=>"de", "label"=>__("JqGridBtnEdit"),
            "action"=>"$('#\" + subgrid_table_id + \"').jqGrid('delGridRow', '\"+cl+\"', {url:'\"+delUrl+\"'});\";\n"
        );
        $_params = array_merge_recursive($params, $_params);
        return self::getBtnStr($_params);
    }

    /*
     * generateSubListBtns
     */
    public static function generateSubListBtns($module, $subModule, $attachInfo=array(), $allowBtns=array("be", "de"))
    {
        $str="";
        $str.="$(\"#\"+subgrid_table_id).jqGrid('setRowData',ids[i],{";
//        $str.="  act:be+de";
        $str.="act:";
        $str.=self::getAllowBtns($allowBtns, '+', $module);
        $str.=" });\n\n";

        $str.="var rowData = $(\"#".WacModuleHelper::getListingTableId($module,$attachInfo)."\").jqGrid('getRowData',row_id);\n";
        $str.="if(rowData['status']==".WacEntityStatus::getInstance()->getId(WacEntityStatus::$audited)." || rowData['status']==".WacEntityStatus::getInstance()->getId(WacEntityStatus::$finish).")";
        $str.= "{\n";
        $str.= "\$(\"#be\"+cl+\"_{$subModule}{$attachInfo["uiid"]}\").attr('disabled','disabled');\n";
        $str.= "\$(\"#de\"+cl+\"_{$subModule}{$attachInfo["uiid"]}\").attr('disabled','disabled');\n";
        $str.= "}\n";
        return $str;
    }

    public static function getAllowBtns($allowBtns='all', $connector='+', $moduleName="")
    {
        $moduleName = self::toSplitName($moduleName);
//        $pattern = "/(.)([A-Z])/";
//        $replacement = "$1_$2";
//        $moduleName = strtolower(preg_replace($pattern, $replacement, $moduleName));
        $user = sfContext::getInstance()->getUser();
        if($allowBtns!='all' && is_array($allowBtns))
        {
            if(!$user->hasCredential("app_{$moduleName}_audit"))
            {
                $tmpIdx = array_search('ba', $allowBtns);
                if($tmpIdx) unset($allowBtns[$tmpIdx]);
            }
            return implode($connector, $allowBtns);
        }
        else
        {
            return implode($connector, self::$ctlBtns);
        }
    }

    public static function toSplitName($name)
    {
        $pattern = "/(.)([A-Z])/";
        $replacement = "$1_$2";
        $newName = strtolower(preg_replace($pattern, $replacement, $name));
        return $newName;
    }

    /*
     * generateListBtns
     * $params - array(
     *    "module", componentGlobalName"
     * )
     * @allowBtns - the btns be asked to show, but also be filtered by user credentials
     * @isInline - for inline action table or not
     */
    public static function generateListBtns($params=array(), $allowBtns='all', $isInline=false)
    {
        $str="";

        $btnArr = array();  // btn elements
        $btnArr['bv'] = self::generateListViewFormBtn($params);  /* bv: button view          */
        if(!$isInline){
            $btnArr['ba'] = self::generateListAuditFormBtn($params); /* ba: button audit         */
            $btnArr['sa'] = self::generateListAddSubFormBtn($params);          /* sa: button add subitems  */
            $btnArr['be'] = self::generateListEditFormBtn($params);  /* be: button edit          */
            $btnArr['de'] = self::generateListDelFormBtn($params);   /* de: button delete        */
        }
        else{
            $btnArr['be'] = self::generateInlineListEditFormBtn($params); /* ba: button edit         */
            $btnArr['se'] = self::generateInlineListSaveFormBtn($params);  /* be: button save          */
            $btnArr['de'] = self::generateInlineListDelFormBtn($params);   /* de: button delete        */
            $btnArr['ce'] = self::generateInlineListCancelFormBtn($params);  /* bv: button cancel          */
        }

        $btnInit = array();  // btn init actions
        $btnInit['bv'] = "$(\"#bv\"+cl+\"_{$params["componentGlobalName"]}\").button({ text:false, icons: {primary: 'ui-icon-print'}});\n";
        $btnInit['ba'] = "$(\"#ba\"+cl+\"_{$params["componentGlobalName"]}\").button({ text:false, icons: {primary: 'ui-icon-check'}});\n";
        $btnInit['sa'] = "$(\"#sa\"+cl+\"_{$params["componentGlobalName"]}\").button({ text:false, icons: {primary: 'ui-icon-circle-plus'}});\n";
        $btnInit['be'] = "$(\"#be\"+cl+\"_{$params["componentGlobalName"]}\").button({ text:false, icons: {primary: 'ui-icon-pencil'}});\n";
        $btnInit['de'] = "$(\"#de\"+cl+\"_{$params["componentGlobalName"]}\").button({ text:false, icons: {primary: 'ui-icon-trash'}});\n";
        $btnInit['ce'] = "$(\"#ce\"+cl+\"_{$params["componentGlobalName"]}\").button({ text:false, icons: {primary: 'ui-icon-cancel'}});\n";
        $btnInit['se'] = "$(\"#se\"+cl+\"_{$params["componentGlobalName"]}\").button({ text:false, icons: {primary: 'ui-icon-disk'}});\n";

        if($allowBtns!='all'){
            foreach(self::$ctlBtns as $ctlBtnKey){
                if(!in_array($ctlBtnKey, $allowBtns)){
                    unset($btnArr[$ctlBtnKey]);
                    unset($btnInit[$ctlBtnKey]);
                }
            }
        }

        if(count($btnArr)>0){
            foreach($btnArr as $btnItem){
                $str.=$btnItem;
            }
        }

        $str.= "$(\"#".WacModuleHelper::getListingTableId($params["moduleName"], $params["attachInfo"])."\").jqGrid('setRowData',ids[i],{";
        $str.= "act:";
        $str.= "'<span id=\\\"btnSet' + cl +'_{$params["componentGlobalName"]}' + '\\\">' + ";
        $str.= self::getAllowBtns($allowBtns, '+', $params["moduleName"]);
        $str.= " + '</span>'";
        $str.= " });\n\n";

        // setup buttonset
        $str.= "$(\"#btnSet\" + cl + \"_{$params["componentGlobalName"]}\").buttonset();\n";
        if(count($btnInit)>0){
            foreach($btnInit as $btnItem){
                $str.=$btnItem;
            }
        }

        $str.= "var rowData = $(\"#".WacModuleHelper::getListingTableId($params["moduleName"], $params["attachInfo"])."\").jqGrid('getRowData',cl);\n";
//        $str.= "wacDebugLog('".WacEntityStatus::getInstance()->getId(WacEntityStatus::$audited).":' + rowData['status']);\n";
        $str.= "if(rowData['status']==".WacEntityStatus::getInstance()->getId(WacEntityStatus::$audited)." || rowData['status']==".WacEntityStatus::getInstance()->getId(WacEntityStatus::$finish).")";
        $str.= "{\n";
        $str.= "\$(\"#ba\"+cl+\"_{$params["componentGlobalName"]}\").attr('disabled','disabled');\n";
        $str.= "\$(\"#sa\"+cl+\"_{$params["subItemModuleName"]}{$params["attachInfo"]['uiid']}\").attr('disabled','disabled');\n";
        $str.= "\$(\"#be\"+cl+\"_{$params["componentGlobalName"]}\").attr('disabled','disabled');\n";
        $str.= "\$(\"#de\"+cl+\"_{$params["componentGlobalName"]}\").attr('disabled','disabled');\n";
        $str.= "}\n";

        return $str;
    }

    /*
     * @return sfOutputEscaperArrayDecorator
     */
    public static function getModuleTableFields($moduleName)
    {
        return Doctrine::getTable(WacTable::$$moduleName)->getFieldNames();
    }
}
