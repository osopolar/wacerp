<?php
/**
 * Description of WacDataType
 *
 * @author ben
 */
class WacDataType extends WacCommonData
{
    public static $char    = "0";
    public static $decimal = "1";
    public static $int     = "2";
    public static $boolean = "3";

    protected static $_instance=null;
    
    protected $_params = array(
        'char'    => array('id'=>"0", 'group'=>'1', 'name'=>"char", 'caption'=>"Type Char"),
        'decimal' => array('id'=>"1", 'group'=>'1', 'name'=>"decimal", 'caption'=>"Type Decimal"),
        'int'     => array('id'=>"2", 'group'=>'1', 'name'=>"int", 'caption'=>"Type Int"),
        'boolean' => array('id'=>"3", 'group'=>'1', 'name'=>"boolean", 'caption'=>"Type Boolean"),
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
    
}