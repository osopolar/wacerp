<?php
/**
 * Description of JqGridDataHelper
 *
 * generate common js data format
 *
 * @author ben
 */
class JqGridDataHelper {
    public static $_instance=null;
    public static $_nodeCount=0;
    
    public static $OPER_ADD  = "add";
    public static $OPER_EDIT = "edit";
    public static $OPER_DEL  = "del";

    public static $KEY_OPER  = "oper";
    public static $KEY_PAGE  = "page";
    public static $KEY_ROWS  = "rows";
    public static $KEY_USER_DATA  = "userdata";
    public static $KEY_SIDX       = "sidx";
    public static $KEY_SORD       = "sord";

    public static $KEY_EMPTY         = "_empty";
    public static $KEY_SEARCH        = "_search";
    public static $KEY_SEARCH_FIELD  = "searchField";
    public static $KEY_SEARCH_OPER   = "searchOper";
    public static $KEY_SEARCH_STRING = "searchString";

    public $cond_map = array();

    public static function getInstance() {
        $class = __CLASS__;
        if(is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __construct()			// construct method
    {
        $this->cond_map = array(
            "eq" => "%s='%s' ",
            "ne" => "%s<>'%s' ",
            "lt" => "%s<'%s' ",
            "le" => "%s<='%s' ",
            "gt" => "%s>'%s' ",
            "ge" => "%s>='%s' ",
            "bw" => "%s LIKE '%%s%%' ",
            "ew" => "%s LIKE '%%%s' ",
            "en" => "not %s LIKE '%%%s' ",
            "bn" => "not %s LIKE '%%%s' ",
            "in" => "%s LIKE '%%%s%%' ",
            "cn" => "%s LIKE '%%%s%%' ",
            "ni" => "not %s LIKE '%%%s%%' ",
            "nc" => "not %s LIKE '%%%s%%' ",
        );
    }

    /*
     * return condition string
     */
    public function getCondMapStr($op, $field, $val)
    {
        return sprintf($this->cond_map[$op], $field, $val);
    }

    /*
     * return original JqGridCommon format data structure
     * @params
     * array $node - node info,
     */
//    public function getOriCommonDatum()
//    {
//        return array(
//        "page"  =>1,
//        "total"   => 1,
//        "records" => 0,
//        "userdata"=> array(),
//        "rows"    => array()
//        );
//    }

    /*
     * return Common format data structure
     * @params
     * the keys are wac standard common datum fields
     */
    public function getCommonDatum()
    {
        return array(
        "currentPage"  =>1,
        "totalPages"   => 1,
        "totalRecords" => 0,
        "userdata"     => array(),
        "items"        => array()
        );
    }

    /*
     *  convert data array to jq data array
     * $resultSet - array()
     * $pager - doctrine pager
     */
//    public function convert($resultSet, $pager)
//    {
//        $result = $this->getOriCommonDatum();
//        $result['page']  = $pager->getPage();
//        $result['total']   = $pager->getLastPage();
//        $result['records'] = $pager->getNumResults();
//        if(is_array($resultSet) && count($resultSet)>0)
//        {
//            $result['rows'] = $resultSet;
//        }
//        return $result;
//    }
    public function convert($resultSet, $pager, $userdata)
    {
        $result = $this->getCommonDatum();
        $result['currentPage']  = $pager->getPage();
        $result['totalPages']   = $pager->getLastPage();
        $result['totalRecords'] = $pager->getNumResults();
        $result[self::$KEY_USER_DATA] = $userdata;
        if(is_array($resultSet) && count($resultSet)>0)
        {
            $result['items'] = $resultSet;
        }
        return $result;
    }

}

