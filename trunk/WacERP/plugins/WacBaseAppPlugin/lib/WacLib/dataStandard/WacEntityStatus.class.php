<?php
/**
 * Description of WacEntityStatus
 *   WacStatus references 
 *
 * @author ben
 */
class WacEntityStatus extends WacCommonData
{
    protected static $_instance=null;
    
    public static $active     = "active";
    public static $inactive   = "inactive";
    public static $avail      = "avail";
    public static $invalid    = "invalid";

    public static $notsave    = "notsave";
    public static $init       = "init";
    public static $processing = "processing";
    public static $finish     = "finish";
    public static $audited    = "audited";
    public static $all        = "all";

    public $_params = array(
        'active'    => array('id'=>"0", 'value'=>1, 'group'=>'1', 'name'=>"active", 'caption'=>"Status Active"),
        'inactive' => array('id'=>"1", 'value'=>0, 'group'=>'1', 'name'=>"inactive", 'caption'=>"Status Inactive"),
        'avail'     => array('id'=>"2", 'value'=>1, 'group'=>'2', 'name'=>"avail", 'caption'=>"Status Avail"),
        'invalid'  => array('id'=>"3", 'value'=>0, 'group'=>'2', 'name'=>"invalid", 'caption'=>"Status Invalid"),

        'notsave'        => array('id'=>"4", 'value'=>4, 'group'=>'3', 'name'=>"notsave", 'caption'=>"Status Not Save"),
        'init'           => array('id'=>"5", 'value'=>5, 'group'=>'3', 'name'=>"init", 'caption'=>"Status Init"),
        'processing'     => array('id'=>"6", 'value'=>6, 'group'=>'3', 'name'=>"processing", 'caption'=>"Status Processing"),
        'audited'        => array('id'=>"7", 'value'=>7, 'group'=>'3', 'name'=>"audited", 'caption'=>"Status Audited"),
        'finish'         => array('id'=>"100", 'value'=>100, 'group'=>'3', 'name'=>"finish", 'caption'=>"Status Finish"),
        'all'            => array('id'=>"1000", 'value'=>1000, 'group'=>'3', 'name'=>"all", 'caption'=>"Status All"),
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

    public function getActiveCaption($v)
    {
        $activeRow = $this->_params[self::$active];
        $inactiveRow = $this->_params[self::$inactive];
        return ($v==$activeRow['value']) ? $activeRow['caption'] : $inactiveRow['caption'];
    }

    public function getAvailCaption($v)
    {
        $activeRow = $this->_params[self::$avail];
        $inactiveRow = $this->_params[self::$invalid];
        return ($v==$activeRow['value']) ? $activeRow['caption'] : $inactiveRow['caption'];
    }
    
}
