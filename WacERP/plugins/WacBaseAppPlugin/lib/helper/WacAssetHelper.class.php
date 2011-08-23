<?php
/**
 * Description of SfDataHelper
 *
 * convert to symfony data format
 *
 * @author ben
 */
class WacAssetHelper {
    public static $_instance=null;

    protected $_i18nImageDir = "";
    protected $_i18nCssDir   = "";

    public static function getInstance() {
        $class = __CLASS__;
        if(is_null(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function getI18nImageDir(){
        if(empty($this->_i18nImageDir)){
           $this->_i18nImageDir = "/images/themes/".sfConfig::get("app_wac_setting_theme")."/i18n/".sfContext::getInstance()->getUser()->getCulture()."/";
        }
        return $this->_i18nImageDir;
    }

    public function getI18nCssDir(){
        if(empty($this->_i18nCssDir)){
           $this->_i18nCssDir = "/css/themes/".sfConfig::get("app_wac_setting_theme")."/i18n/".sfContext::getInstance()->getUser()->getCulture()."/";
        }
        return $this->_i18nCssDir;
    }

    /*
     * serialize an array
     */
    public function serializeArray($items, $spliter=':', $pairSpliter=';', $isI18N=false) {
        if(is_array($items) && count($items)>0){
            $tmpArr = array();
            if (!$isI18N) {
                foreach ($items as $k => $v) {
                    $tmpArr[] = $k . $spliter . $v;
                }
                return implode($pairSpliter, $tmpArr);
            } else {
                $i18n = sfContext::getInstance()->getI18N();
                foreach ($items as $k => $v) {
                    $tmpArr[] = $k . $spliter . $i18n->__($v);
                }
                return implode($pairSpliter, $tmpArr);
            }
        }
        return "";
    }

}

