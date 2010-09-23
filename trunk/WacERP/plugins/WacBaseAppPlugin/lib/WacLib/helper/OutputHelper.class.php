<?php
/**
 * Description of OutputHelper
 *
 * format output data
 *
 * @author ben
 */
class OutputHelper
{
    public static $_instance=null;
    public $isDebug = true;

    public static function getInstance() {
        $class = __CLASS__;
        if(is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __construct()			// construct method
    {
        ;
    }

    /*
     * return format datum according to the request format parameter
     *      */
    public function datumFormat($items, $request)
    {
        $resultSet = array();
        switch($request->getParameter("data_format")) {
            case StaticWacDataFormatType::$jsonFlexbox:
                $resultSet = JqFlexboxDataHelper::getInstance()->getCommonDatum($items);
                break;
            default:
                break;
        }

        return $resultSet;
    }

    /*
     * return JsCommon format data structure
     * @params
     * array $node - node info,
     */
    public function outputJsonOrTextFormat($resultSet, $action)
    {
        $output = '';
        if ($action->getRequest()->isXmlHttpRequest()) {
            sfConfig::set('sf_web_debug', false);
            $action->getResponse()->setHttpHeader("Cache-Control", "no-cache, must-revalidate");
            $action->getResponse()->setHttpHeader("Pragma", "no-cache");
            $action->getResponse()->setHttpHeader("Expires", 0);
            
            $action->getResponse()->setContentType('application/json; charset=utf-8');
            $output = json_encode($resultSet);
        }
        else {
            if($this->isDebug){
                $resultSet["info"]["req_params"] = $action->getRequest()->getParameterHolder()->getAll();
            }
            return $action->renderText($action->getPartial(WacModule::getName("wacCommon").'/blank', array('output' => $resultSet)));
        }
        return $action->renderText($output);
    }

    /*
     * return xml
     * @params
     * array $node - node info,
     */
    public function outputXmlFormat($resultSet, $action)
    {
        sfConfig::set('sf_web_debug', false);
        $action->getResponse()->setHttpHeader("Cache-Control", "no-cache, must-revalidate");
        $action->getResponse()->setHttpHeader("Pragma", "no-cache");
        $action->getResponse()->setHttpHeader("Expires", 0);
        $action->getResponse()->setContentType('application/xml; encoding=utf-8');

        return $action->renderText(print_r($resultSet, true));
    }

    /*
     * return output html select elements
     * @params - $resultSet array(array(key, value))
     * array $node - node info,
     */
    public function outputHtmlSelectElements($resultSet, $action, $params=array())
    {
        $output = '<select>';
        if(isset($params) && count($params)>0)
        {
            if($params['withNullItem'])
            {
                $output.="<option value='0'></option> ";
            }
        }

        if(count($resultSet)>0)
        {
            foreach($resultSet as $item)
            {
                $output.="<option value='{$item['key']}'>{$item['value']}</option> ";
            }
        }

        $output.='</select>';        
        return $action->renderText($output);
    }

}

