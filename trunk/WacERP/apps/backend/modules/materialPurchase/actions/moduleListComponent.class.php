<?php
/**
 * manage the module list
 */
class moduleListComponent extends WacModuleListComponent
{
    // override parent method
    public function setupJqGridCols(){
        $jqGridDataHelper = JqGridDataHelper::getInstance();
        $i18n = sfContext::getInstance()->getI18N();

        $listCols = array();
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"id", "label"=>"id", "index"=>"id", "width"=>"60", "align"=>"left"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"name", "label"=>$i18n->__("Name"), "index"=>"name", "editable"=>"true", "formoptions"=>"{elmsuffix:\"(*)\"}", "editrules"=>"{required:true}", "width"=>"250"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"code", "label"=>$i18n->__("Coding"), "index"=>"code", "editable"=>"true", "editrules"=>"{required:true}", "align"=>"left", "width"=>"120"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"created_at", "label"=>$i18n->__("Create Time"), "index"=>"created_at", "sorttype"=>"date", "datefmt"=>"Y-m-d", "align"=>"center", "width"=>"150"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"is_avail_label", "label"=>$i18n->__("Is avail"), "index"=>"is_avail", "editable"=>"true", "edittype"=>"checkbox", "formatter"=>"WacEntity.jqGridFormatter.availFormatter", "unformat"=>"WacEntity.jqGridFormatter.availUnformatter", "editoptions"=>"{value:\"1:0\", defaultValue:\"1\"}", "width"=>"60"));
        return $listCols;
    }

    public function setupOperatorBtns(){
        // pls refer to WacModuleHelper::$ctlBtns
        return array('bv', 'be', 'se', 'ce', 'de');
    }
    
    public function execute($request)
    {
        parent::execute($request);
    }

}