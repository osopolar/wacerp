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
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"user_name", "label"=>$i18n->__("Field User"), "index"=>"user_name", "width"=>"100", "align"=>"left"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"type", "label"=>$i18n->__("Field Type"), "index"=>"type", "width"=>"200"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"content", "label"=>$i18n->__("Field Content"), "index"=>"content", "sortable"=>"false", "width"=>"450"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"created_at", "label"=>$i18n->__("Field Create Time"), "index"=>"created_at", "sorttype"=>"date",  "datefmt"=>"Y-m-d",  "width"=>"150"));
        return $listCols;
    }

    public function setupOperatorBtns(){
        // pls refer to WacModuleHelper::$ctlBtns
        return array('bv', 'de');
    }

    public function execute($request)
    {
        parent::execute($request);
    }

}