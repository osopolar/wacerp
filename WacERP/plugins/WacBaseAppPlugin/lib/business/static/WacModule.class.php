<?php
/**
 * Description of wacModule
 *
 * @author ben
 */
class WacModule extends WacCommonData
{
    protected static $_instance=null;

    /*
     * properties notes:
     * uiPanelId: as frontend ui menu panel id, if it is not be used on frontend, then value is 0
     *
     */
    
    protected $_params = array(
          'wacCommon'               => array('id'=>"0",  'uiPanelId'=>"0", 'group'=>'1', 'name'=>"wacCommon", 'caption'=>"公共模块"),
          'wacCountry'              => array('id'=>"1",  'uiPanelId'=>"20001", 'group'=>'1', 'name'=>"wacCountry", 'caption'=>"国家"),
          'wacLanguage'             => array('id'=>"2",  'uiPanelId'=>"20002", 'group'=>'1', 'name'=>"wacLanguage", 'caption'=>"语言"),
          'wacSysmsg'               => array('id'=>"3",  'uiPanelId'=>"20003", 'group'=>'1', 'name'=>"wacSysmsg", 'caption'=>"系统信息"),

          'wacCurrency'             => array('id'=>"4",  'uiPanelId'=>"20005", 'group'=>'1', 'name'=>"wacCurrency", 'caption'=>"货币"),
          'wacCustomer'             => array('id'=>"5",  'uiPanelId'=>"0", 'group'=>'1', 'name'=>"wacCustomer", 'caption'=>"客户"),
          'wacCustomerParameter'    => array('id'=>"6",  'uiPanelId'=>"0", 'group'=>'1', 'name'=>"wacCustomerParameter", 'caption'=>"客户参数"),

          'wacSystemLog'            => array('id'=>"7",  'uiPanelId'=>"21002", 'group'=>'1', 'name'=>"wacSystemLog", 'caption'=>"系统日志"),
          'wacSystemParameter'      => array('id'=>"8",  'uiPanelId'=>"20006", 'group'=>'1', 'name'=>"wacSystemParameter", 'caption'=>"系统参数"),
          'wacUnit'                 => array('id'=>"9",  'uiPanelId'=>"20004", 'group'=>'1', 'name'=>"wacUnit", 'caption'=>"计量单位"),

          'wacGuardPermission'      => array('id'=>"10", 'uiPanelId'=>"23004", 'group'=>'1', 'name'=>"wacGuardPermission", 'caption'=>"权限管理"),
          'wacGuardGroup'           => array('id'=>"11", 'uiPanelId'=>"23003", 'group'=>'1', 'name'=>"wacGuardGroup", 'caption'=>"用户组管理"),
          'wacGuardUser'            => array('id'=>"12", 'uiPanelId'=>"23002", 'group'=>'1', 'name'=>"wacGuardUser", 'caption'=>"用户管理"),

          'wacI18n'                 => array('id'=>"13", 'uiPanelId'=>"0", 'group'=>'1', 'name'=>"wacI18n", 'caption'=>"多语言服务"),
          'wacPrint'                => array('id'=>"14", 'uiPanelId'=>"0", 'group'=>'1', 'name'=>"wacPrint", 'caption'=>"打印服务"),
          'wacFileManager'          => array('id'=>"15", 'uiPanelId'=>"21003", 'group'=>'1', 'name'=>"wacFileManager", 'caption'=>"文件管理器"),
          'wacCategory'             => array('id'=>"16", 'uiPanelId'=>"22002", 'group'=>'1', 'name'=>"wacCategory", 'caption'=>"分类管理"),
          'wacTest'                 => array('id'=>"17", 'uiPanelId'=>"0", 'group'=>'1', 'name'=>"wacTest", 'caption'=>"测试模块"),
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

//    /*
//     * get attribute
//     */
//    public static function getAttribute($module, $attribute)
//    {
//        return self::$_params[$module][$attribute];
//    }
//
//    /*
//     * getId
//     */
//    public static function getId($module)
//    {
//        return self::getAttribute($module, 'id');
//    }
//
//    /*
//     * getName
//     */
//    public static function getName($module)
//    {
//        return self::getAttribute($module, 'name');
//    }
//
//    /*
//     * getCaption
//     */
//    public static function getCaption($module)
//    {
//        return self::getAttribute($module, 'caption');
//    }

}
