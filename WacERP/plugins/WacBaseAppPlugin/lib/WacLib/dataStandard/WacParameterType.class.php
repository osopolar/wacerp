<?php
/**
 * Description of WacParameterType
 *
 * @author ben
 */
class WacParameterType
{
    public static $params = array(
        'common' => array('id'=>"0", 'group'=>'1', 'name'=>"common", 'caption'=>"普通类型"),
        'special' => array('id'=>"1", 'group'=>'1', 'name'=>"special", 'caption'=>"特殊类型"),
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
    
    /*
     * @return caption
     */
    public static function getAttributeById($id, $attribute)
    {
        $row = self::getRowById($id);
        if($row != false){
            return $row[$attribute];
        }
    }

    /*
     *  getRowById
     * @return false or found array
     */
    public static function getRowById($id)
    {
        $result = false;
        foreach(self::$params as $param)
        {
            if($param['id']==$id)
            {
                $result = $param;
                break;
            }
        }
        return $result;
    }

    /*
     * 
     */
    public static function getIdCaptionHash($isArr=true, $spliter=':', $pairSpliter=';' )
    {
        return self::getAttributeHash('id', 'caption', $isArr, $spliter);
    }

    /*
     * get Hash array or string
     */
    public static function getAttributeHash($keyName, $valName, $isArr=true, $spliter=':', $pairSpliter=';')
    {
        $tmpArr = array();
        
        if($isArr)
        {
            foreach(self::$params as $param) {
                $tmpArr[$param[$keyName]] = $param[$valName];
            }
            return $tmpArr;
        }
        else
        {
            foreach(self::$params as $param) {
                $tmpArr[] = $param[$keyName].$spliter.$param[$valName];
            }
            return implode($pairSpliter, $tmpArr);
        }
    }

    /*
     * get attribute
     */
    public static function getAttribute($module, $attribute)
    {
        return self::$params[$module][$attribute];
    }

    /*
     * getId
     */
    public static function getId($module)
    {
        return self::getAttribute($module, 'id');
    }

    /*
     * getName
     */
    public static function getName($module)
    {
        return self::getAttribute($module, 'name');
    }

    /*
     * getCaption
     */
    public static function getCaption($module)
    {
        return self::getAttribute($module, 'caption');
    }

    /*
     * getCaptionById
     */
    public static function getCaptionById($id)
    {
        return self::getAttributeById($id, 'caption');
    }

}
