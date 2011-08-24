<?php
/**
 * manage the form
 */
class moduleManagementPanelComponent extends WacComponent
{
    public function execute($request)
    {
        parent::execute($request);
        $this->settingParams = $this->getUser()->getAttributeHolder()->getAll(WacAssetHelper::NS_USER);
    }
    
}