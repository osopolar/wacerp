<?php
/**
 * Description of JsCommonData
 *
 * generate common js data format
 *
 * @author ben
 */
class JsCommonData {
    protected static $_instance=null;
    public static $_nodeCount=0;

    public static $KEY_ITEMS = "items";
    public static $KEY_INFO  = "info";


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
     * return JsCommon list meata data structure
     * @params
     * array $node - node info,
     */
    public static function getListMetaDatum() {

        return array('displayCols' => array());
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
        "req_params" => array()
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
        "req_params" =>  array()
        );
    }

}

