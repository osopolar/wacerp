<?php
/**
 * manage the module list
 */
class moduleListComponent extends WacModuleListComponent
{
    // override setupJqGridCols method
    public function setupJqGridCols(){
        $jqGridDataHelper = JqGridDataHelper::getInstance();
        $i18n = sfContext::getInstance()->getI18N();

        $listCols = array();
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"id", "label"=>"id", "index"=>"id", "width"=>"30"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"name", "label"=>$i18n->__("Coding"), "index"=>"name", "width"=>"100", "align"=>"left"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"description", "label"=>$i18n->__("Name"), "index"=>"description", "width"=>"200"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"permissions_names", "label"=>$i18n->__("Remark"), "index"=>"permissions_names", "sortable"=>"false", "width"=>"450"));
        $listCols[] = $jqGridDataHelper->getCol(array("name"=>"created_at", "label"=>$i18n->__("Create Time"), "index"=>"created_at", "sorttype"=>"date",  "datefmt"=>"Y-m-d",  "width"=>"150"));
        return $listCols;
    }

    public function setupOperatorBtns(){
        // pls refer to WacModuleHelper::$ctlBtns
        return array('bv', 'be', 'de');
    }

    public function execute($request)
    {
        parent::execute($request);
    }

}