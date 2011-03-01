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
        return isset($attachInfo["name"]) ? $module.$attachInfo["name"]."Widget" : $module."Widget";
    }

    /*
     * getComponentsId
     */
    public static function getComponentsId($module, $attachName="")
    {
        return $module.$attachName."Component";
    }

    /*
     * getTreeId
     */
    public static function getTreeId($module, $attachName="")
    {
        return $module.$attachName."Tree";
    }

    /*
     * getListingTableId
     */
    public static function getListingTableId($module, $attachName="")
    {
        return $module.$attachName."ListingTable";
    }

    /*
     * getFormDialogId
     */
    public static function getFormDialogId($module, $attachName="")
    {
        return $module.$attachName."FormDialog";
    }

    /*
     * getFormId
     */
    public static function getFormId($module, $attachName="")
    {
        return $module.$attachName."Form";
    }

    /*
     * getSubFormDialogId
     */
    public static function getSubFormDialogId($module, $attachName="")
    {
        return $module.$attachName."SubFormDialog";
    }

    /*
     * getSubFormId
     */
    public static function getSubFormId($module, $attachName="")
    {
        return $module.$attachName."SubForm";
    }

    /*
     * getPagerId
     */
    public static function getPagerId($module, $attachName="")
    {
        return $module.$attachName."Pager";
    }

    /*
     * getListId
     */
    public static function getListId($module, $attachName="")
    {
        return $module.$attachName."List";
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
    protected static function getBtnStr($module, $attachName="", $params=array())
    {
        $str = " {$params['tag']} = ";
        $str.= "\"<button ";
        // id
        $str.= "id=\\\"{$module}{$attachName}_{$params['tag']}\" + cl +\"\\\" ";
        // class
//        $str.= "text=\\\"false\\\" icons=\\\"{primary: ui-icon-pencil}\\\" ";
        // action
        $str.= "onclick=\\\"javascript:";  //action
        if(isset($params["action"])){
            $str.= $params["action"]."\\\"";
        }
        elseif(isset($params["event"])){
            $str.= "$.shout('#{$module}{$attachName}{$params["event"]}', {id: \" + cl +\" });\\\"";
        }
        $str.= " >";
        // label
        $str.= $params["label"];
        $str.= "</button>\";\n";

        return $str;
    }

    public static function generateListEditFormBtn($module, $attachName="")
    {
        $params = array(
            "tag"=>"be", "label"=>__("JqGridBtnEdit"), "event"=>sfConfig::get("app_wac_events_show_edit_form")
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    /*
     * generateListDelFormBtn
     */
    public static function generateListDelFormBtn($module, $attachName="")
    {
        $params = array(
            "tag"=>"de", "label"=>__("JqGridBtnDel"), 
            "action"=>" $('#".WacModuleHelper::getListId($module, $attachName)."').jqGrid('delGridRow', '\"+cl+\"', {url:'\" + delUrl + \"/dataFormat/json/', top: 200, left:500});\\\""
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    /*
     * generateListViewFormBtn
     */
    public static function generateListViewFormBtn($module, $attachName="")
    {
        $actionStr = "$.shout(WacAppConfig.event.app_wac_events_show_data_print_form, {";
        $actionStr .= "moduleName:\'{$module}\',";
        $actionStr .= "moduleAction:\'view\',";
        $actionStr .= "moduleCaption:\'view\" + cl +\"\' ,";
        $actionStr .= "dataFormat:\'".WacDataFormatType::$htmlEntityView."\',";
        $actionStr .= JqGridDataHelper::$KEY_SEARCH.":\'true\',";
        $actionStr .= JqGridDataHelper::$KEY_SEARCH_FIELD.":\'id',";
        $actionStr .= JqGridDataHelper::$KEY_SEARCH_OPER.":\'eq\',";
        $actionStr .= JqGridDataHelper::$KEY_SEARCH_STRING.":\" + cl +\"";
        $actionStr .= "});";

        $params = array(
            "tag"=>"bv",
            "label"=>__("JqGridBtnPrint"),
            "action"=>$actionStr
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    public static function generateInlineListEditFormBtn($module, $attachName="")
    {
        $modulePrefixName = $module.$attachName;
        $params = array(
            "tag"=>"be", "label"=>__("JqGridBtnEdit"),
            "action"=>" $('#".WacModuleHelper::getListId($module, $attachName)."').jqGrid('editRow', '\"+cl+\"', true, null, {$modulePrefixName}Callback.save, '\" + editUrl + \"', WacEntity.extraParam);"
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    public static function generateInlineListSaveFormBtn($module, $attachName="")
    {
        $modulePrefixName = $module.$attachName;
        $params = array(
            "tag"=>"se", "label"=>__("JqGridBtnSave"),
            "action"=>" $('#".WacModuleHelper::getListId($module, $attachName)."').jqGrid('saveRow', '\"+cl+\"', true, null, {$modulePrefixName}Callback.save, '\" + editUrl + \"', WacEntity.extraParam, null);"
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    public static function generateInlineListCancelFormBtn($module, $attachName="")
    {
        $modulePrefixName = $module.$attachName;
        $params = array(
            "tag"=>"ce", "label"=>__("JqGridBtnCancel"),
            "action"=>" $('#".WacModuleHelper::getListId($module, $attachName)."').jqGrid('restoreRow', '\"+cl+\"');"
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    public static function generateInlineListDelFormBtn($module, $attachName="")
    {
        $modulePrefixName = $module.$attachName;
        $params = array(
            "tag"=>"de", "label"=>__("JqGridBtnDel"),
            "action"=>" $('#".WacModuleHelper::getListId($module, $attachName)."').jqGrid('delGridRow', '\"+cl+\"', {url:'\" + delUrl + \"/dataFormat/json/', top: 200, left:500});"
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    /*
     * generateListAuditFormBtn
     */
    public static function generateListAuditFormBtn($module, $attachName="")
    {
        $params = array(
            "tag"=>"ba", "label"=>__("JqGridBtnAudit"),
            "action"=>" wacConfirmDialog({$module}{$attachName}AuditAction, '\" + cl +\"');"
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    /*
     * generateListAddSubFormBtn
     */
    public static function generateListAddSubFormBtn($module, $subModule, $attachName="")
    {
        $params = array(
            "tag"=>"sa", "label"=>__("JqGridBtnAddSubItem"),
            "action"=>" {$module}{$attachName}OpenModuleForm('".WacModuleHelper::getFormDialogId($module, $attachName)."', '{$module}{$attachName}', '".WacOperationType::$add."' , 0, '\" + cl +\"');"
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    /*
     * generateSubListEditFormBtn
     */
    public static function generateSubListEditFormBtn($module, $attachName="")
    {
        $params = array(
            "tag"=>"be", "label"=>__("JqGridBtnEdit"),
            "action"=>"\"{$module}{$attachName}OpenModuleForm('{$module}{$attachName}FormDialog', '{$module}{$attachName}', '".WacOperationType::$edit."' , '\"+cl+\"', '\" + row_id +\"');\";\n"
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    /*
     * generateSubListDelFormBtn
     */
    public static function generateSubListDelFormBtn($module, $attachName="")
    {
        $params = array(
            "tag"=>"de", "label"=>__("JqGridBtnEdit"),
            "action"=>"$('#\" + subgrid_table_id + \"').jqGrid('delGridRow', '\"+cl+\"', {url:'\"+delUrl+\"'});\";\n"
        );
        return self::getBtnStr($module, $attachName, $params);
    }

    /*
     * generateSubListBtns
     */
    public static function generateSubListBtns($module, $subModule, $attachName="", $allowBtns=array("be", "de"))
    {
        $str="";
        $str.="$(\"#\"+subgrid_table_id).jqGrid('setRowData',ids[i],{";
//        $str.="  act:be+de";
        $str.="act:";
        $str.=self::getAllowBtns($allowBtns, '+', $module);
        $str.=" });\n\n";

        $str.="var rowData = $(\"#".WacModuleHelper::getListId($module,$attachName)."\").jqGrid('getRowData',row_id);\n";
        $str.="if(rowData['status']==".WacEntityStatus::getInstance()->getId(WacEntityStatus::$audited)." || rowData['status']==".WacEntityStatus::getInstance()->getId(WacEntityStatus::$finish).")";
        $str.= "{\n";
        $str.= "\$(\"#{$subModule}{$attachName}_be\"+cl).attr('disabled','disabled');\n";
        $str.= "\$(\"#{$subModule}{$attachName}_de\"+cl).attr('disabled','disabled');\n";
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
     * @module - module name
     * @subModule - submodule name
     * @attachName - attach name
     * @allowBtns - the btns be asked to show, but also be filtered by user credentials
     * @isInline - for inline action table or not
     * @params - spare
     */
    public static function generateListBtns($module, $subModule, $attachName="", $allowBtns='all', $isInline=false, $params=array())
    {
        $str="";

        $btnArr = array();  // btn elements
        $btnArr['bv'] = self::generateListViewFormBtn($module, $attachName);  /* bv: button view          */
        if(!$isInline){
            $btnArr['ba'] = self::generateListAuditFormBtn($module, $attachName); /* ba: button audit         */
            $btnArr['sa'] = self::generateListAddSubFormBtn($module, $subModule, $attachName);          /* sa: button add subitems  */
            $btnArr['be'] = self::generateListEditFormBtn($module, $attachName);  /* be: button edit          */
            $btnArr['de'] = self::generateListDelFormBtn($module, $attachName);   /* de: button delete        */
        }
        else{
            $btnArr['be'] = self::generateInlineListEditFormBtn($module, $attachName); /* ba: button edit         */
            $btnArr['se'] = self::generateInlineListSaveFormBtn($module, $attachName);  /* be: button save          */
            $btnArr['de'] = self::generateInlineListDelFormBtn($module, $attachName);   /* de: button delete        */
            $btnArr['ce'] = self::generateInlineListCancelFormBtn($module, $attachName);  /* bv: button cancel          */
        }

        $btnInit = array();  // btn init actions
        $btnInit['bv'] = "$(\"#{$module}{$attachName}_bv\"+cl).button({ text:false, icons: {primary: 'ui-icon-print'}});\n";
        $btnInit['ba'] = "$(\"#{$module}{$attachName}_ba\"+cl).button({ text:false, icons: {primary: 'ui-icon-check'}});\n";
        $btnInit['sa'] = "$(\"#{$module}{$attachName}_sa\"+cl).button({ text:false, icons: {primary: 'ui-icon-circle-plus'}});\n";
        $btnInit['be'] = "$(\"#{$module}{$attachName}_be\"+cl).button({ text:false, icons: {primary: 'ui-icon-pencil'}});\n";
        $btnInit['de'] = "$(\"#{$module}{$attachName}_de\"+cl).button({ text:false, icons: {primary: 'ui-icon-trash'}});\n";
        $btnInit['ce'] = "$(\"#{$module}{$attachName}_ce\"+cl).button({ text:false, icons: {primary: 'ui-icon-cancel'}});\n";
        $btnInit['se'] = "$(\"#{$module}{$attachName}_se\"+cl).button({ text:false, icons: {primary: 'ui-icon-disk'}});\n";

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

        $str.= "$(\"#".WacModuleHelper::getListId($module, $attachName)."\").jqGrid('setRowData',ids[i],{";
        $str.= "act:";
        $str.= "'<span id=\\\"{$module}{$attachName}_btnSet' + cl +'\\\">' + ";
        $str.= self::getAllowBtns($allowBtns, '+', $module);
        $str.= " + '</span>'";
        $str.= " });\n\n";

        // setup buttonset
        $str.= "$(\"#{$module}{$attachName}_btnSet\"+cl).buttonset();\n";
        if(count($btnInit)>0){
            foreach($btnInit as $btnItem){
                $str.=$btnItem;
            }
        }

        $str.= "var rowData = $(\"#".WacModuleHelper::getListId($module, $attachName)."\").jqGrid('getRowData',cl);\n";
//        $str.= "wacDebugLog('".WacEntityStatus::getInstance()->getId(WacEntityStatus::$audited).":' + rowData['status']);\n";
        $str.= "if(rowData['status']==".WacEntityStatus::getInstance()->getId(WacEntityStatus::$audited)." || rowData['status']==".WacEntityStatus::getInstance()->getId(WacEntityStatus::$finish).")";
        $str.= "{\n";
        $str.= "\$(\"#{$module}{$attachName}_ba\"+cl).attr('disabled','disabled');\n";
        $str.= "\$(\"#{$subModule}{$attachName}_sa\"+cl).attr('disabled','disabled');\n";
        $str.= "\$(\"#{$module}{$attachName}_be\"+cl).attr('disabled','disabled');\n";
        $str.= "\$(\"#{$module}{$attachName}_de\"+cl).attr('disabled','disabled');\n";
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
