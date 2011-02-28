<?php
/**
 * Description of WacParameterType
 *
 * @author ben
 */
class WacParameterType extends WacCommonData
{
    protected static $_instance=null;
    
    protected $params = array(
        'common' => array('id'=>"0", 'group'=>'1', 'name'=>"common", 'caption'=>"Type Common"),
        'special' => array('id'=>"1", 'group'=>'1', 'name'=>"special", 'caption'=>"Type Special"),
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