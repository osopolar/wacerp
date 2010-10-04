<?php
/**
 * Description of JsCommonDataHelper
 *
 * generate common js data format
 *
 * @author ben
 */
class JsCommonData {
    public static $_instance=null;
    public static $_nodeCount=0;


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
    public static function getCommonDatum() {

        return array('items' => array(), 'info'=>array());
    }

    /*
     * return JsError format data structure
     * @params
     * array $node - node info,
     */
    public static function getErrorDatum($msg="", $code=0, $attrsInfo = array()) {

        return array(
        "status" => WacOperationStatus::$Error,
        "error_code" => $code,
        "message"    => $msg,
        "attributes"=>$attrsInfo,
        );
    }

    /*
     * return JsSuccess format data structure
     * @params
     * array $node - node info,
     */
    public static function getSuccessDatum($msg="", $code=0, $attrsInfo = array()) {

        return array(
        "status" => WacOperationStatus::$Succss,
        "error_code" => $code,
        "message"    => $msg,
        "attributes"=>$attrsInfo,
        );
    }

}

