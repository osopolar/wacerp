<?php
/**
 * Description of WacI18nHelper
 *
 * get i18n data
 *
 * @author ben
 */
class WacI18nHelper
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
     * return i18n array
     * @params
     * 
     */
    public function getJsMessages(sfAction $action, $params=array())
    {
        $i18n = sfContext::getInstance()->getI18N();
        $i18nMessageFormat = $i18n->getMessageFormat();
        $request = $action->getRequest();

        if($request->hasParameter("culture")){
            sfContext::getInstance()->getUser()->setCulture($request->getParameter("culture"));
        }

        $i18n->__("", null, "messages-js");
        $sfMsgTrans = $i18nMessageFormat->getSource()->read();
        return $this->toPropertiesText($sfMsgTrans);
//        $resultArr = $i18nMessageFormat->getSource()->read();
//        return print_r($resultArr, true);
    }

    protected  function toPropertiesText($sfMsgTrans){
        $output = "";
        if(count($sfMsgTrans)>0){
            foreach($sfMsgTrans as $transKey => $transItems ){
                if(count($transItems)>0){
                    foreach($transItems as $msgKey=>$msgValues){
                        $output.= "{$msgKey} = {$msgValues[0]}\n";
                    }
                }
            }
        }
        return $output;
    }
    

}