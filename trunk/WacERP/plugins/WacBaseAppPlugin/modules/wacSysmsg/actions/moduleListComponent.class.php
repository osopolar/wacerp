<?php
/**
 * manage the module list
 */
class moduleListComponent extends WacModuleListComponent
{
    public function setupToolbarSearchField(){
        return "code";
    }

    public function setupRowNum(){
        return 15;
    }

    // override parent method
    public function setupJqGridCols(){
        $jqGridDataHelper = JqGridDataHelper::getInstance();

        $cultureOptions = sprintf("{value:\"%s\"}", WacAssetHelper::getInstance()->serializeArray(sfConfig::get("app_wac_setting_support_cultures"), ':', ';', true ));

        $listCols = array();
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"id", "label"=>"id", "index"=>"id", "width"=>"35", "align"=>"left"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"culture_code", "label"=>$this->i18n->__("Culture"), "index"=>"type", "editable"=>"true", "width"=>"80", "edittype"=>"select","editoptions"=>$cultureOptions));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"code", "label"=>$this->i18n->__("Coding"), "index"=>"code", "editable"=>"true", "editrules"=>"{required:true}", "align"=>"left", "width"=>"320"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"content", "label"=>$this->i18n->__("Content"), "index"=>"content", "editable"=>"true", "sortable"=>"false", "align"=>"left", "width"=>"420"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"created_at", "label"=>$this->i18n->__("Create Time"), "index"=>"created_at", "sorttype"=>"date",  "datefmt"=>"Y-m-d",  "width"=>"150"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"is_avail", "label"=>$this->i18n->__("Is avail"), "index"=>"is_avail", "editable"=>"true", "edittype"=>"checkbox", "formatter"=>"WacEntity.jqGridFormatter.availFormatter", "unformat"=>"WacEntity.jqGridFormatter.availUnformatter", "editoptions"=>"{value:\"1:0\", defaultValue:\"1\"}", "width"=>"35"));
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