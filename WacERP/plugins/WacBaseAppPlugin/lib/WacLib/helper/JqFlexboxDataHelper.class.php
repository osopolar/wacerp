<?php
/**
 * Description of JqFlexboxDataHelper
 *
 * generate common js data format of flexbox
 * e.g. {"results":[{"id":0,"name":"abjure"}],"total":"1"}
 *
 * @author ben
 */
class JqFlexboxDataHelper {
    public static $_instance=null;

    public static $querySting = "q";

    public static function getInstance() {
        $class = __CLASS__;
        if(is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    /*
     * return JqGridCommon format data structure
     * @params
     * array $node - node info,
     */
    public function getCommonDatum($params)
    {
        return array(
        "results"  => $this->getItems($params),
        "total"    => 1
        );
    }

    /*
     * get item
     * $params = array("key"=>"", "value"=>"");
     */
    public function getItem($param)
    {
        return array("id"=>$param['key'], "name"=>$param['value']);
    }

    /*
     * get items
     * $params = array("key"=>"", "value"=>"");
     */
    public function getItems($params)
    {
        $resultArr = array();
        if(is_array($params) && count($params)>0)
        {
            foreach($params as $param){
                $resultArr[] = $this->getItem($param);
            }
        }
        return $resultArr;
    }

}

