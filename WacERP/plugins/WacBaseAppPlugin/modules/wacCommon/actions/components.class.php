<?php

/**
 * provides common components
 */
class wacCommonComponents extends WacComponent
{
    public function executeAppBar($request)
    {
         parent::execute($request);
         $this->user = $this->getUser();
    }

    public function executeMasterControlTableA($request)
    {
         parent::execute($request);
    }

    public function executeEmbedWidget($request)
    {
         parent::execute($request);
    }

    public function executeDataExportWidget($request)
    {
         parent::execute($request);
         $this->form = new DataExportForm(
                array("dataExportFormat" => "xml"),   // default
                array("ds" => sfConfig::get("app_wac_setting_data_export_format"))  // data source
                );
    }

    public function executeInlineTableWidget($request)
    {
        $this->execute($request);
    }

    public function executeModuleIndexListWidget($request)
    {
        $this->execute($request);
    }

    public function executeTableToolbar($request)
    {
        $this->execute($request);
    }

//    public function executeBaseInlineTableA($request)
//    {
//        $this->execute($request);
//    }

    
}