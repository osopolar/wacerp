<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JsonRpcUploadHelper
 *
 * according to the prototype of plupload upload script, provides upload methods
 *
 * @author ben
 * @time 12/24/2009 6:36:51 PM
 */
class JsonRpcUploadHelper
{
    protected static $_instance=null;
    protected $_jsonRpcData = null;



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

