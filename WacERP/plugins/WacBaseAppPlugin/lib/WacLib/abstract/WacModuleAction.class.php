<?php

/**
 * WacCommonActions actions.
 *
 * Descriptions: provides common methods for wac action
 *
 * @package    Wac
 * @subpackage lib
 * @author     ben
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
abstract class WacModuleAction extends WacCommonActions {
    /*
     * a switch setting, if some module not allow, override this and return false;
     */
    public function allowSetupMainModuleTable(){
        return true;
    }
    
    public function executeGetPanelForm(sfWebRequest $request) {
        $str = $this->getComponent($this->contextInfo["moduleName"], WacComponentList::$modulePanelForm,
                        array(
                            'invokeParams' => array(
                                'contextInfo' => $this->contextInfo,
                                'attachInfo' => array("uiid" => WacWidgetHelper::getInstance()->getUiid($this->contextInfo))
                        ))
                );

        return OutputHelper::getInstance()->output($str, $this, array("isCache" => false));
    }

    public function executeGetManagementPanel(sfWebRequest $request) {
        $str = $this->getComponent($this->contextInfo["moduleName"], WacComponentList::$moduleManagementPanel,
                        array(
                            'invokeParams' => array(
                                'contextInfo' => $this->contextInfo,
                                'attachInfo' => array("uiid" => WacWidgetHelper::getInstance()->getUiid($this->contextInfo))
                        ))
                );

        return OutputHelper::getInstance()->output($str, $this, array("isCache" => false));
    }
}