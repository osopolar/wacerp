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
     * return JsCommon format data structure
     * @params
     * array $node - node info,
     */
    public function output(array $resultSet, sfAction $action, $params=array())
    {
        if(!$action->getRequest()->hasParameter("dataFormat")){
            throw new sfException("Wac Error: require parameter 'dataFormat'!");
        }
        else{
            $dataFormat = $action->getRequest()->getParameter("dataFormat");
            switch ($dataFormat) {
                case WacDataFormatType::$json:
                    return $this->outputJsonOrTextFormat($resultSet, $action);
                    break;
                case WacDataFormatType::$xml:
                    return $this->outputXmlFormat($resultSet, $action, true, false);
                    break;
                case WacDataFormatType::$jsonFlexbox:
                    $resultSet = JqFlexboxDataHelper::getInstance()->getCommonDatum($items);
                    return $this->outputXmlFormat($resultSet, $action, false);
                    break;
                default:
                    return $this->outputJsonOrTextFormat($resultSet, $action);
                    break;
            }
        }        
    }

    /*
     * return JsCommon format data structure
     * @params
     * array $node - node info,
     */
    public function outputJsonOrTextFormat(array $resultSet, sfAction $action)
    {
        $output = '';
        if ($action->getRequest()->isXmlHttpRequest()) {
            $this->setNoCacheHeader($action, false);            
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
    public function outputXmlFormat($resultSet, sfAction $action, $isConvertToXML=false, $formatOutput=false)
    {
        $this->setNoCacheHeader($action, false);
        $action->getResponse()->setContentType('application/xml; encoding=utf-8');
        if($isConvertToXML){
            $document = DOM::arrayToDOMDocument($resultSet, "root");
            $document->formatOutput = $formatOutput;
            return $action->renderText($document->saveXML());
        }
        else{
            return $action->renderText(print_r($resultSet, true));
        }
    }

    /*
     *
     */
    public function debugRequest(sfAction $action)
    {
        $reqParams = $action->getRequest()->getParameterHolder()->getAll();
        return $action->renderPartial(WacModule::getName("wacCommon").'/blank', array('output' => $reqParams));
    }

    /*
     * return output html select elements
     * @params - $resultSet array(array(key, value))
     * array $node - node info,
     */
    public function outputHtmlSelectElements($resultSet, $action, $params=array())
    {
        $this->setNoCacheHeader($action, false);
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

    public function setNoCacheHeader($action, $isSfDebug=false)
    {
        sfConfig::set('sf_web_debug', $isSfDebug);
        $action->getResponse()->setHttpHeader("Cache-Control", "no-cache, must-revalidate");
        $action->getResponse()->setHttpHeader("Pragma", "no-cache");
        $action->getResponse()->setHttpHeader("Expires", 0);        
    }

    public function writeNote($v, $isReturnStr=false, $params=array())
    {
        $format = "\n\n<!-- WacNote: %s-->\n\n";
        $str = sprintf($format, $v);
        if(!$isReturnStr){
            echo $str;
        }
        else{
            return $str;
        }
    }

}