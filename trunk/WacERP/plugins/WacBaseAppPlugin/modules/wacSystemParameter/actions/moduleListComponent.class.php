<?php
/**
 * manage the module list
 */
class moduleListComponent extends WacModuleListComponent
{
    public function setupToolbarSearchField(){
        return "name";
    }

    // override parent method
    public function setupJqGridCols(){
        $jqGridDataHelper = JqGridDataHelper::getInstance();

        $typeOptions = sprintf("{value:\"%s\"}", WacDataType::getInstance()->getIdCaptionHash(false, ':', ';', true ));

        $listCols = array();
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"id", "label"=>"id", "index"=>"id", "width"=>"50", "align"=>"left"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"name", "label"=>$this->i18n->__("Name"), "index"=>"name", "editable"=>"true", "width"=>"200", "align"=>"left"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"code", "label"=>$this->i18n->__("Coding"), "index"=>"code", "editable"=>"true", "editrules"=>"{required:true}", "align"=>"left", "width"=>"250"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"type", "label"=>$this->i18n->__("Data Type"), "index"=>"type", "editable"=>"true", "width"=>"200", "edittype"=>"select","editoptions"=> $typeOptions));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"value", "label"=>$this->i18n->__("Value"), "index"=>"value", "editable"=>"true", "sortable"=>"false", "width"=>"150"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"created_at", "label"=>$this->i18n->__("Create Time"), "index"=>"created_at", "sorttype"=>"date",  "datefmt"=>"Y-m-d",  "width"=>"150"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"is_avail", "label"=>$this->i18n->__("Is avail"), "index"=>"is_avail", "editable"=>"true", "edittype"=>"checkbox", "formatter"=>"WacEntity.jqGridFormatter.availFormatter", "unformat"=>"WacEntity.jqGridFormatter.availUnformatter", "editoptions"=>"{value:\"1:0\", defaultValue:\"1\"}", "width"=>"60"));
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