<?php

/**
 * test actions.
 *
 * @package    WacERP
 * @subpackage test
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wacTestActions extends WacCommonActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->addWacActionJs();

        //component js required, begin
//
//        //component css required, begin
//        $this->getResponse()->addStylesheet("apps/backend/console/".__CLASS__.".css", 'last');
//        //component css required, begin

//        $this->setLayout("layout");
    }

    public function executeTestForm(sfWebRequest $request) {
        $this->form = new DataExportForm( 
                array("dataExportFormat" => 0),   // default
                array("ds" => sfConfig::get("app_wac_setting_data_export_format"))  // data source
                );

//        $this->setLayout("layout");
    }

    /*
     * test component
     */
    public function executeTc(sfWebRequest $request) {
        
    }

}
