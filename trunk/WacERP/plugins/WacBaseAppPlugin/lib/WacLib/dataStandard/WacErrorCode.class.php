<?php
/**
 * Description of WacErrorCode
 *    error codes
 *
 * @author ben
 */
class WacErrorCode
{
    public static $_instance=null;

    protected static $_defaultLang = 'cn';
    
    public static $duplicatedName = '0001';

    // if too much options, we can store them to db table
    public static $params = array(
                                  '0001'=> array(
                                              'en'=>array('info'=>"'%s' is duplicated name!"),
                                              'cn'=>array('info'=>"错误！ '%s', 该项名字已存在!"),
                                           ),
                                  );

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
     * get error info
     */
    public static function getInfo($code, $attachMsg="field")
    {
        return sprintf(self::$params[$code][self::$_defaultLang]['info'], $attachMsg);
    }

    public function getDefaultLang()
    {
        return self::$_defaultLang;
    }

    public function setDefaultLang($v)
    {
        if(self::$_defaultLang != $v)
        {
            self::$_defaultLang = $v;
        }
    }

}
