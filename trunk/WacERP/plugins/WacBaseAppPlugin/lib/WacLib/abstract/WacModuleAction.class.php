<?php

/**
 * WacCommonActions actions.
 *
 * Descriptions: it serve business module action, it can determine setup MainModuleTable, some module usual methods
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

    /*
     * can be override
     */
    protected function _getFormData(sfWebRequest $request){
        $resultSet = JsCommonData::getCommonDatum();
        $resultSet['info'] = JsCommonData::getSuccessDatum();

        if ($request->hasParameter('id')) {
            $targetItem = $this->mainModuleTable->findOneById($request->getParameter('id'));
            if($targetItem){
                $resultSet['items']['modelEntity'] = $targetItem->toArray();
            }
            else{
                $resultSet['info'] = JsCommonData::getErrorDatum($this->getSysMsg('sys_err_entity_not_found'));
                $resultSet['items']['modelEntity'] = array();
            }
        }

        return $resultSet;
    }

    public function executeGetFormData(sfWebRequest $request) {
        return OutputHelper::getInstance()->output($this->_getFormData($request), $this);
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