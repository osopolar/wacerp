<?php
/**
 * Description of SfDataHelper
 *
 * convert to symfony data format
 *
 * @author ben
 */
class SfDataHelper {
    public static $_instance=null;

    public static function getInstance() {
        $class = __CLASS__;
        if(is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    /*
     * convert data to symfony select data
     * e.g.
     */
    public function toSelectOptions($dataItems, $fieldKey, $fieldValue)
    {
        $resultArr = array();
        if(is_array($dataItems) && count($dataItems)>0)
        {
            foreach($dataItems as $dataItem){
                    $resultArr[$dataItem[$fieldKey]] = $dataItem[$fieldValue];
            }
        }
        return $resultArr;
    }

}

