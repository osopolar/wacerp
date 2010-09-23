<?php
/**
 * Description of WacEntityStatus
 *   WacStatus references 
 *
 * @author ben
 */
class WacEntityStatus
{
    public static $active     = "active";
    public static $inActive  = "inActive";
    public static $avail      = "avail";
    public static $inAvail   = "inAvail";

    public static $notsave    = "notsave";
    public static $init       = "init";
    public static $processing = "processing";
    public static $finish     = "finish";
    public static $audited    = "audited";

    public static $params = array(
        'active'    => array('id'=>"0", 'value'=>1, 'group'=>'1', 'name'=>"active", 'caption'=>"活跃"),
        'inActive' => array('id'=>"1", 'value'=>0, 'group'=>'1', 'name'=>"inActive", 'caption'=>"冬眠"),
        'avail'     => array('id'=>"2", 'value'=>1, 'group'=>'2', 'name'=>"avail", 'caption'=>"有效"),
        'inAvail'  => array('id'=>"3", 'value'=>0, 'group'=>'2', 'name'=>"inAvail", 'caption'=>"无效"),

        'notsave'        => array('id'=>"4", 'value'=>4, 'group'=>'3', 'name'=>"notsave", 'caption'=>"未保存"),
        'init'           => array('id'=>"5", 'value'=>5, 'group'=>'3', 'name'=>"init", 'caption'=>"初始"),
        'processing'     => array('id'=>"6", 'value'=>6, 'group'=>'3', 'name'=>"processing", 'caption'=>"进行中"),
        'audited'        => array('id'=>"7", 'value'=>7, 'group'=>'3', 'name'=>"audited", 'caption'=>"已审批"),
        'finish'         => array('id'=>"100", 'value'=>100, 'group'=>'3', 'name'=>"finish", 'caption'=>"已完结"),
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

    public static function getActiveCaption($v)
    {
        $activeRow = self::$params[self::$active];
        $inActiveRow = self::$params[self::$inActive];
        return ($v==$activeRow['value']) ? $activeRow['caption'] : $inActiveRow['caption'];
    }

    /*
     * get by group
     */
    public static function getByGroup($group='1')
    {
        $tmpArr = array();
        foreach(self::$params as $param)
        {
            if($param['group']==$group)
            {
                $tmpArr[] = $param;
            }
        }
        return $tmpArr;
    }

    /*
     * get attribute
     */
    public static function getAttribute($key, $attribute)
    {
        return self::$params[$key][$attribute];
    }

    /*
     * getId
     */
    public static function getId($key)
    {
        return self::getAttribute($key, 'id');
    }

    /*
     * getName
     */
    public static function getName($key)
    {
        return self::getAttribute($key, 'name');
    }

    /*
     * getCaption
     */
    public static function getCaption($key)
    {
        return self::getAttribute($key, 'caption');
    }

    /*
     * getValue
     */
    public static function getValue($key)
    {
        return self::getAttribute($key, 'value');
    }

    /*
     * getCaption
     */
    public static function getCaptionById($id)
    {
        return self::getAttributeById($id, 'caption');
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

}
