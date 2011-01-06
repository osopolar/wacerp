<?php
/**
 * Description of WacModuleHelper
 *
 * @author ben
 *
 * declare:
 * buttons = bv+ba+sa+be+de
 * bv: button view
 * ba: button audit
 * sa: button add subitems
 * be: button edit
 * de: button delete
 *
 */
class WacModuleHelper
{
    public static $ctlBtns = array('bv','ba','sa','be','de');
    
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
     * getComponentsId
     */
    public static function getComponentsId($module, $attachName="")
    {
        return $module.$attachName."Component";
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
     * generate hidden fields
     * @params - (sfOutputEscaperArrayDecorator) objMainModuleTableFields
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

    public static function generateListEditFormBtn($module, $attachName="")
    {
        $str =" be = ";
        $str.=" \"<input id=\\\"{$module}{$attachName}_be\" + cl +\"\\\" type=\\\"button\\\" onclick=\\\"javascript:";
        $str.= "$.shout('#{$module}{$attachName}".sfConfig::get("app_wac_events_show_edit_form")."', {id: \" + cl +\" });";
        $str.="\\\" value='".__("JqGridBtnEdit")."' style=\\\"height: 22px; width: 28px;\\\">\";\n";

        return $str;
    }

    /*
     * generateListDelFormBtn
     */
    public static function generateListDelFormBtn($module, $attachName="")
    {
        $str =" de = ";
        $str.=" \"<input id=\\\"{$module}{$attachName}_de\" + cl +\"\\\" type=\\\"button\\\" onclick=\\\"javascript:";
        $str.=" jQuery('#".WacModuleHelper::getListId($module, $attachName)."').jqGrid('delGridRow', '\"+cl+\"', {url:'\" + delUrl + \"/dataFormat/json/', top: 200, left:500});\\\"";
        $str.=" value='".__("JqGridBtnDel")."' style=\\\"height: 22px; width: 28px;\\\">\";\n";

        return $str;
    }

    /*
     * generateListViewFormBtn
     */
    public static function generateListViewFormBtn($module, $attachName="")
    {
        $str =" bv = ";
        $str.=" \"<input id=\\\"{$module}{$attachName}_bv\" + cl +\"\\\" class=\\\"{$module}{$attachName}_bv\\\" type=\\\"button\\\" onclick=\\\"javascript:";
        $str.=" wacPopupWindow(\'{$module}{$attachName}PopupWin\', \'printer/Form/pModule/{$module}/pAction/print/id/\" + cl +\"\', 650, 550 );\\\"";
        $str.=" value='".__("JqGridBtnDetail")."' style=\\\"height: 22px; width: 50px;\\\">\";\n";

        return $str;
    }

    /*
     * generateListAuditFormBtn
     */
    public static function generateListAuditFormBtn($module, $attachName="")
    {
        $str =" ba = ";
        $str.=" \"<input id=\\\"{$module}{$attachName}_ba\" + cl +\"\\\" type=\\\"button\\\" onclick=\\\"javascript:";
        $str.=" wacConfirmDialog({$module}{$attachName}AuditAction, '\" + cl +\"');\\\"";
        $str.=" value='".__("JqGridBtnAudit")."' style=\\\"height: 22px; width: 50px;\\\">\";\n";

        return $str;
    }

    /*
     * generateListAddSubFormBtn
     */
    public static function generateListAddSubFormBtn($module, $attachName="")
    {
        $str =" sa = ";
        $str.=" \"<input id=\\\"{$module}{$attachName}_sa\" + cl +\"\\\" type=\\\"button\\\" onclick=\\\"javascript:";
        $str.=" {$module}{$attachName}OpenModuleForm('".WacModuleHelper::getFormDialogId($module, $attachName)."', '{$module}{$attachName}', '".WacOperationType::$add."' , 0, '\" + cl +\"');\\\"";
        $str.=" value='".__("JqGridBtnAddSubItem")."' style=\\\"height: 22px; width: 62px;\\\">\";\n";

        return $str;
    }

    /*
     * generateSubListEditFormBtn
     */
    public static function generateSubListEditFormBtn($module, $attachName="")
    {
        $str = "be =  \"<input id=\\\"{$module}{$attachName}_be\" + cl +\"\\\" type=\\\"button\\\" style=\\\"height: 22px; width: 28px;\\\" value=\\\"".__("JqGridBtnEdit")."\\\" onclick=\\\"javascript: \";\n";
        $str .="be += \"{$module}{$attachName}OpenModuleForm('{$module}{$attachName}FormDialog', '{$module}{$attachName}', '".WacOperationType::$edit."' , '\"+cl+\"', '\" + row_id +\"');\";\n";
        $str .="be += \"\\\">\";\n";

        return $str;
    }

    /*
     * generateSubListDelFormBtn
     */
    public static function generateSubListDelFormBtn($module, $attachName="")
    {
        $str ="de = \"<input id=\\\"{$module}{$attachName}_de\" + cl +\"\\\" type=\\\"button\\\" style=\\\"height: 22px; width: 28px;\\\" value=\\\"".__("JqGridBtnDel")."\\\" onclick=\\\"javascript: \";\n";
        $str.="de += \"jQuery('#\" + subgrid_table_id + \"').jqGrid('delGridRow', '\"+cl+\"', {url:'\"+delUrl+\"'});\";\n";
        $str.="de += \"\\\">\"\n";

        return $str;
    }

    /*
     * generateSubListBtns
     */
    public static function generateSubListBtns($module, $subModule, $attachName="", $allowBtns=array("be", "de"))
    {
        $str="";
        $str.="jQuery(\"#\"+subgrid_table_id).jqGrid('setRowData',ids[i],{";
//        $str.="  act:be+de";
        $str.="act:";
        $str.=self::getAllowBtns($allowBtns, '+', $module);
        $str.=" });\n\n";

        $str.="var rowData = jQuery(\"#".WacModuleHelper::getListId($module,$attachName)."\").jqGrid('getRowData',row_id);\n";
        $str.="if(rowData['status']==".WacEntityStatus::getId(WacEntityStatus::$audited)." || rowData['status']==".WacEntityStatus::getId(WacEntityStatus::$finish).")";
        $str.= "{\n";
        $str.= "\$(\"#{$subModule}{$attachName}_be\"+cl).attr('disabled','disabled');\n";
        $str.= "\$(\"#{$subModule}{$attachName}_de\"+cl).attr('disabled','disabled');\n";
        $str.= "}\n";
        return $str;
    }

    /*
     * generateSubListBtns
     */
//    public static function generateSubListDelBtn($module, $subModule, $attachName="")
//    {
//        $str="";
//        $str.="jQuery(\"#\"+subgrid_table_id).jqGrid('setRowData',ids[i],{";
//        $str.="  act:de";
//        $str.=" });\n\n";
//
//        $str.="var rowData = jQuery(\"#".WacModuleHelper::getListId($module,$attachName)."\").jqGrid('getRowData',row_id);\n";
//        $str.="if(rowData['status']==".WacEntityStatus::getId(WacEntityStatus::$audited)." || rowData['status']==".WacEntityStatus::getId(WacEntityStatus::$finish).")";
//        $str.= "{\n";
//        $str.= "\$(\"#{$subModule}{$attachName}_de\"+cl).attr('disabled','disabled');\n";
//        $str.= "}\n";
//        return $str;
//    }

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
     * 
     * generateListBtns
     */
    public static function generateListBtns($module, $subModule, $attachName="", $allowBtns='all')
    {
        $str="";
        $str.="jQuery(\"#".WacModuleHelper::getListId($module, $attachName)."\").jqGrid('setRowData',ids[i],{";
        $str.="act:";
        $str.=self::getAllowBtns($allowBtns, '+', $module);
        $str.=" });\n\n";

        $str.="var rowData = jQuery(\"#".WacModuleHelper::getListId($module, $attachName)."\").jqGrid('getRowData',cl);\n";
//        $str.= "wacDebugLog('".WacEntityStatus::getId(WacEntityStatus::$audited).":' + rowData['status']);\n";
        $str.="if(rowData['status']==".WacEntityStatus::getId(WacEntityStatus::$audited)." || rowData['status']==".WacEntityStatus::getId(WacEntityStatus::$finish).")";
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
