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
     * $resultSet - mixed string/array,
     */
    public function output($resultSet, sfAction $action, $params=array())
    {
        if(!$action->getRequest()->hasParameter("dataFormat")){
            throw new sfException("Wac Error: require parameter 'dataFormat'!");
        }
        else{
            $dataFormat = $action->getRequest()->getParameter("dataFormat");

            switch ($dataFormat) {
                case WacDataFormatType::$json:
                    return $this->outputJsonOrTextFormat($resultSet, $action, $params);
                    break;
                case WacDataFormatType::$xml:
                    return $this->outputXmlFormat($resultSet, $action, true, false, $params);
                    break;
                case WacDataFormatType::$jsonFlexbox:
                    $resultSet = JqFlexboxDataHelper::getInstance()->getCommonDatum($params["items"]);
                    return $this->outputXmlFormat($resultSet, $action, false, false, $params);
                    break;
                case WacDataFormatType::$text:
                    return $this->outputTextFormat($resultSet, $action, $params);
                    break;
                case WacDataFormatType::$pureText:
                case WacDataFormatType::$pureTextJs:
                    return $this->outputPureTextFormat($resultSet, $action, $params);
                    break;
                default:
                    return $this->outputJsonOrTextFormat($resultSet, $action, $params);
                    break;
            }
        }        
    }

    /*
     * return pure text
     * @params
     * array $node - node info,
     */
    public function outputPureTextFormat($output, sfAction $action, $params=array())
    {
        if(isset($params["isCache"]) && $params["isCache"]){
            $this->setCacheHeader($action, false);
        }
        else{
           $this->setNoCacheHeader($action, false);
        }
//        $this->setCacheHeader($action, false);

        $action->getResponse()->setContentType('application/text; charset=utf-8');
        return $action->renderText($output);
    }

    /*
     * return JsCommon format data structure
     * @params
     * array $node - node info,
     */
    public function outputTextFormat($output, sfAction $action, $params=array())
    {
        if ($action->getRequest()->isXmlHttpRequest()) {
            $this->setNoCacheHeader($action, false);
            $action->getResponse()->setContentType('application/text; charset=utf-8');
        }
        else {
            if($this->isDebug){
                $resultSet = array();
                $resultSet["output"] = $output;
                $resultSet["info"]["req_params"] = $action->getRequest()->getParameterHolder()->getAll();
            }
            return $action->renderText($action->getPartial(WacModule::getName("wacCommon").'/debugBlank', array('output' => $resultSet)));
        }
        return $action->renderText($action->getPartial(WacModule::getName("wacCommon").'/blank', array('output' => $output)));
    }

    /*
     * return JsCommon format data structure
     * @params
     * array $node - node info,
     */
    public function outputJsonOrTextFormat(array $resultSet, sfAction $action, $params=array())
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

            return $action->renderText($action->getPartial(WacModule::getName("wacCommon").'/debugBlank', array('output' => $resultSet)));
        }
        return $action->renderText($output);
    }

    /*
     * return xml
     * @params
     * array $node - node info,
     */
    public function outputXmlFormat($resultSet, sfAction $action, $isConvertToXML=false, $formatOutput=false, $params=array())
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
        return $action->renderPartial(WacModule::getName("wacCommon").'/debugBlank', array('output' => $reqParams));
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
        return true;
    }

    public function setCacheHeader($action, $isSfDebug=false)
    {
        sfConfig::set('sf_web_debug', $isSfDebug);
        sfConfig::set('sf_cache', true);
        $action->getResponse()->addCacheControlHttpHeader('max_age=180');
        $action->getResponse()->setHttpHeader('Expires', $action->getResponse()->getDate(time() + 3600));
        return true;
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