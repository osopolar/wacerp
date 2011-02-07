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

    protected $_request = null;
    protected $_response = null;

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
        $this->_request = $action->getRequest();
        $this->_response = $action->getResponse();
        if(!$this->_request->hasParameter("dataFormat")){
            throw new sfException("Wac Error: require parameter 'dataFormat'!");
        }
        else{
            $dataFormat = $this->_request->getParameter("dataFormat");

            switch ($dataFormat) {
                case WacDataFormatType::$json:
                    return $this->outputJsonOrTextFormat($resultSet, $action, $params);
                    break;
                case WacDataFormatType::$xml:
                    return $this->outputXmlFormat($resultSet, $action, false, $params);
                    break;
                case WacDataFormatType::$jsonFlexbox:
                    $params = array("isConvertToXML" => false);
                    $resultSet = JqFlexboxDataHelper::getInstance()->getCommonDatum($params["items"]);
                    return $this->outputXmlFormat($resultSet, $action, false, $params);
                    break;
                case WacDataFormatType::$text:
                case WacDataFormatType::$txt:
                    return $this->outputTextFormat($resultSet, $action, $params);
                    break;
                case WacDataFormatType::$pureText:
                    return $this->outputPureTextFormat($resultSet, $action, $params);
                    break;
                case WacDataFormatType::$html:
                    return $this->outputHtmlFormat($resultSet, $action, $params);
                    break;
                case WacDataFormatType::$htmlTable:
                    return $this->outputHtmlTableFormat($resultSet, $action, $params);
                    break;
                case WacDataFormatType::$htmlEntityView:
                    return $this->outputHtmlEntityViewFormat($resultSet, $action, $params);
                    break;
                case WacDataFormatType::$pureTextJs:   // for http request, but no any debug wrapping
                    return $this->outputPureTextJsFormat($resultSet, $action, $params);
                    break;
                default:
                    return $this->outputJsonOrTextFormat($resultSet, $action, $params);
                    break;
            }
        }        
    }

    /*
     * export data, force data can be export/download
     * @params
     */
    public function export($resultSet, sfAction $action, $params=array())
    {
        $this->_request = $action->getRequest();
        $this->_response = $action->getResponse();

        $action->setLayout(false);

        if(!$this->_request->hasParameter("dataFormat")){
            throw new sfException("Wac Error: require parameter 'dataFormat'!");
        }
        else{
            $dataFormat = $this->_request->getParameter("dataFormat");
            $output = "";
            $bom = chr(0xEF).chr(0xBB).chr(0xBF); // output utf8 BOM first "ZERO WIDTH NO-BREAK SPACE"

            switch ($dataFormat) {
                case WacDataFormatType::$json:
                    $output = json_encode($resultSet);
                    break;
                case WacDataFormatType::$xml:
                    $document = DOM::arrayToDOMDocument($resultSet, "root");
                    $document->formatOutput = true;
                    $output = $document->saveXML();
                    break;
                case WacDataFormatType::$csv:
                    $output = $bom;
                    if(count($resultSet["items"])>0){
                        foreach($resultSet["items"] as $resultItem){
                            $output.=implode(",", $resultItem)."\n";
                        }
                    }
                    break;
                case WacDataFormatType::$html:
                    break;
                case WacDataFormatType::$text:
                case WacDataFormatType::$txt:
                default:
                    $output = print_r($resultSet["items"], true);
                    break;
            }
            
            $this->_response->clearHttpHeaders();
            $this->_response->setContentType('application/octet-stream;');

            $fileName = $params["fileName"];
            if(WacEnvInfo::getInstance()->isIeBrowser()){
                $fileName = urlencode($params["fileName"]);
            }

            $this->_response->setHttpHeader('Content-Length', strlen($output));
            $this->_response->setHttpHeader("Content-Disposition", "attachment; filename={$fileName}.{$dataFormat}");
            $this->_response->setHttpHeader("Cache-Control", "no-cache, must-revalidate");
            $this->_response->setHttpHeader("Expires", 0);
            $this->_response->setHttpHeader('Pragma', 'no-cache');
            $this->_response->sendHttpHeaders();
            $this->_response->setContent($output);

//        $this->_response->setContent(readfile($pdfpath));
            
            
        }
        return sfView::NONE;
    }

    /*
     * return pure html text
     * @params
     * array $node - node info,
     */
    public function outputHtmlFormat($output, sfAction $action, $params=array())
    {
        if(isset($params["isCache"]) && $params["isCache"]){
            $this->setCacheHeader($action, false);
        }
        else{
           $this->setNoCacheHeader($action, false);
        }
        
        $this->_response->setContentType('text/html; charset=utf-8');
//        $action->setTemplate("debugBlank", "wacCommon");
        return $action->renderText($output);
    }

    /*
     * return pure html text
     * @params
     * array $resultSet - data info,
     */
    public function outputHtmlTableFormat($resultSet, sfAction $action, $params=array())
    {
        $output = "";
        $tableTpl = "htmlTableA";
        $output = $action->getPartial(WacModule::getName("wacCommon")."/".$tableTpl, array('resultSet' => $resultSet));
        return $this->outputHtmlFormat($output, $action, $params);
    }

    /*
     * return pure html text
     * @params
     * array $resultSet - data info,
     */
    public function outputHtmlEntityViewFormat($resultSet, sfAction $action, $params=array())
    {
//        return $this->outputJsonOrTextFormat($resultSet, $action, $params);
        $output = "";
        $tableTpl = "htmlEntityViewA";
        $output = $action->getPartial(WacModule::getName("wacCommon")."/".$tableTpl, array('resultSet' => $resultSet));
        return $this->outputHtmlFormat($output, $action, $params);
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
        $this->_response->setContentType('application/text; charset=utf-8');
        return $action->renderText($output);
    }

    /*
     * return pure json text
     * @params
     * array $node - node info,
     */
    public function outputPureTextJsFormat($output, sfAction $action, $params=array())
    {
        if(isset($params["isCache"]) && $params["isCache"]){
            $this->setCacheHeader($action, false);
        }
        else{
           $this->setNoCacheHeader($action, false);
        }
        $this->_response->setContentType('application/javascript; charset=utf-8');
        return $action->renderText($output);
    }

    /*
     * return JsCommon format data structure
     * @params
     * array $node - node info,
     */
    public function outputTextFormat($output, sfAction $action, $params=array())
    {
        if ($this->_request->isXmlHttpRequest()) {
            $this->setNoCacheHeader($action, false);
            $this->_response->setContentType('application/text; charset=utf-8');
        }
        else {
            if($this->isDebug){
                $resultSet = array();
                $resultSet["output"] = $output;
                $resultSet["info"]["req_params"] = $this->_request->getParameterHolder()->getAll();
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
        if ($this->_request->isXmlHttpRequest()) {
            if (isset($params["isCache"]) && $params["isCache"]) {
                $this->setCacheHeader($action, false);
            } else {
                $this->setNoCacheHeader($action, false);
            }
            $this->_response->setContentType('application/json; charset=utf-8');
            $output = json_encode($resultSet);
        }
        else {
            if($this->isDebug){
                $resultSet["info"]["req_params"] = $this->_request->getParameterHolder()->getAll();
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
    public function outputXmlFormat($resultSet, sfAction $action, $formatOutput=false, $params=array("isConvertToXML" => true))
    {
        $this->setNoCacheHeader($action, false);
        $this->_response->setContentType('application/xml; encoding=utf-8');
        if(isset($params["isConvertToXML"]) && $params["isConvertToXML"]==true){
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
        $reqParams = $this->_request->getParameterHolder()->getAll();
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
        $this->_response->setHttpHeader("Cache-Control", "no-cache, must-revalidate");
        $this->_response->setHttpHeader("Pragma", "no-cache");
        $this->_response->setHttpHeader("Expires", 0);
        return true;
    }

    public function setCacheHeader($action, $isSfDebug=false)
    {
        sfConfig::set('sf_web_debug', $isSfDebug);
//        sfConfig::set('sf_cache', true);
        $this->_response->setHttpHeader('Last-Modified', $this->_response->getDate(time() - 86400));
        $this->_response->setHttpHeader('Expires', $this->_response->getDate(time() + 86400));
        $this->_response->setHttpHeader("Pragma", "cache");
        $this->_response->addCacheControlHttpHeader('max_age=180');
        $this->_response->addCacheControlHttpHeader('private=True');
        return true;
    }

    public function writeNote($v, $isReturnStr=false, $params=array())
    {
        $format = "\n<!-- WacNote: %s-->\n";
        $str = sprintf($format, $v);
        if(!$isReturnStr){
            echo $str;
        }
        else{
            return $str;
        }
    }

}