<?php
/**
 * Description of JsonRpcData
 * 
 *
 * @author ben
 */
class JsonRpcData extends WacCommonData
{
    protected static $_instance=null;
    
    public static $version = "2.0";

    public $_params = array(
        '101'  => array('id'=>"101", 'code'=>101, 'caption'=>"Failed to open input stream."),
        '102'  => array('id'=>"102", 'code'=>102, 'caption'=>"Failed to open output stream."),
        '103'  => array('id'=>"103", 'code'=>103, 'caption'=>"Failed to move uploaded file."),
    );

    public static function getInstance()
    {
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

    public function getErrMsg($code){
        return array(
            "jsonrpc" => self::$version,
            "error"   => array(
                "code"    => (int)$code,
                "message" => $this->getCaption($code)
                )
        );
    }

    public function getSuccMsg(){
        return array(
            "jsonrpc" => self::$version,
            "result"  => null,
            "id"      => "id"
        );
    }
    
    
}
