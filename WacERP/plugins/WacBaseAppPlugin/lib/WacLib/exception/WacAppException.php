<?php
/**
 * WacAppException
 *
 * @package    Wac
 * @subpackage lib/common
 * @author     ben
 * @version    
 */

class WacAppException extends Exception
{
    protected $_refObj=null;
    public function __construct($message, $code=0, $refObj=NULL) {
        parent::__construct($message, $code);
        if(isset($refObj) && !is_null($refObj))
        {
            $this->_refObj = $refObj;
        }
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "A Custom function for this type of exception\n";
    }

    public function getRefObj()
    {
        return $this->_refObj;
    }

    public static function handleGeneralError($e)
    {
        echo "Caught Default Exception \n", $e;
    }
}

?>