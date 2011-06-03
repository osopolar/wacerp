<?php
/**
 * WacLogger
 *
 * @package    Wac
 * @subpackage lib/utils
 * @author     ben
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class WacLogger extends WacCommonData
{
    public static $_instance=null;

    public static $logTypeSys = "1";
    public static $logTypeUser = "2";

    protected $_params = array(
        'sys'  => array('id'=>"1", 'value'=>1, 'group'=>'1', 'name'=>"sys", 'caption'=>"Log Type System"),
        'user' => array('id'=>"2", 'value'=>2, 'group'=>'1', 'name'=>"user", 'caption'=>"Log Type User")
    );


    public $loggerTable = null;
    public $msgTable = null;

    public static function getInstance() {
        $class = __CLASS__;
        if(is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __construct()			// construct method
    {
        $this->msgTable = Doctrine::getTable(WacTable::$wacSysmsg);
        $this->loggerTable = Doctrine::getTable(WacTable::$wacSystemLog);
    }

    /*
     * @params = array("type"=>"", "userId"=>"", "userName"=>"", "target"=>"", "targetId"=>"");
     * 
     */
    public function logOperation($operation, $params=array())
    {
        $logMsg = "";
        $content = null;
        switch($operation)
        {
            case WacOperationType::$add:
                $content = $this->msgTable->getContentByCode("sys_log_add");
                break;
            case WacOperationType::$read:
                break;
            case WacOperationType::$edit:
                $content = $this->msgTable->getContentByCode("sys_log_edit");
                break;
            case WacOperationType::$del:
                $content = $this->msgTable->getContentByCode("sys_log_delete");
                break;
            case WacOperationType::$audit:
                $content = $this->msgTable->getContentByCode("sys_log_audit");
                break;
            default:
                break;
        }

        $logMsg = sprintf($content, $params['userName'], $params['target'], $params['targetId']);
        $logObj = $this->loggerTable->create();
        $logObj->setUserId($params['userId']);
        $logObj->setType($params['type']);
        $logObj->setContent($logMsg);
        $logObj->save();
    }

}
