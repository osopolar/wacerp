<?php
/**
 * Description of wacModule
 *
 * @author ben
 */
class WacModule extends WacCommonData
{
    protected static $_instance=null;
    
    protected $_params = array(
          'wacCommon'         => array('id'=>"0", 'group'=>'1', 'name'=>"wacCommon", 'caption'=>"公共模块"),
//          'wacJar'            => array('id'=>"1", 'group'=>'1', 'name'=>"wacJar", 'caption'=>"缸号"),
//          'wacAxis'           => array('id'=>"2", 'group'=>'1', 'name'=>"wacAxis", 'caption'=>"轴号"),
//          'wacSpinner'        => array('id'=>"3", 'group'=>'1', 'name'=>"wacSpinner", 'caption'=>"纺纱机"),
//          'wacFactory'        => array('id'=>"4", 'group'=>'1', 'name'=>"wacFactory", 'caption'=>"工厂"),
//          'wacStorehouse'     => array('id'=>"5", 'group'=>'1', 'name'=>"wacStorehouse", 'caption'=>"仓库"),
          'wacGoodsCategory'  => array('id'=>"6", 'group'=>'1', 'name'=>"wacGoodsCategory", 'caption'=>"货物品种"),
          'wacCountry'        => array('id'=>"7", 'group'=>'1', 'name'=>"wacCountry", 'caption'=>"国家"),
          'wacLanguage'       => array('id'=>"8", 'group'=>'1', 'name'=>"wacLanguage", 'caption'=>"语言"),
          'wacSysmsg'         => array('id'=>"9", 'group'=>'1', 'name'=>"wacSysmsg", 'caption'=>"系统信息"),
//          'wacColor'          => array('id'=>"10",'group'=>'1', 'name'=>"wacColor", 'caption'=>"颜色"),

//          'wacBusinessLog'          => array('id'=>"11",'group'=>'1', 'name'=>"wacBusinessLog", 'caption'=>"商业操作日志"),
//          'wacCleanUpForm'          => array('id'=>"12",'group'=>'1', 'name'=>"wacCleanUpForm", 'caption'=>"整理单"),
//          'wacCleanUpFormItem'      => array('id'=>"13",'group'=>'1', 'name'=>"wacCleanUpFormItem", 'caption'=>"整理单子项"),
//          'wacCleanUpQcForm'        => array('id'=>"14",'group'=>'1', 'name'=>"wacCleanUpQcForm", 'caption'=>"整理QC单"),
//          'wacCleanUpQcFormItem'    => array('id'=>"15",'group'=>'1', 'name'=>"wacCleanUpQcFormItem", 'caption'=>"整理QC单项目"),
//          'wacCottonOrder'          => array('id'=>"16",'group'=>'1', 'name'=>"wacCottonOrder", 'caption'=>"棉纱单"),
//          'wacCottonOrderGoodsItem' => array('id'=>"17",'group'=>'1', 'name'=>"wacCottonOrderGoodsItem", 'caption'=>"棉纱单货物子项"),
          'wacCurrency'             => array('id'=>"18",'group'=>'1', 'name'=>"wacCurrency", 'caption'=>"货币"),
          'wacCustomer'             => array('id'=>"19",'group'=>'1', 'name'=>"wacCustomer", 'caption'=>"客户"),
          'wacCustomerParameter'    => array('id'=>"20",'group'=>'1', 'name'=>"wacCustomerParameter", 'caption'=>"客户参数"),
//          'wacDefectiveProductForm' => array('id'=>"21",'group'=>'1', 'name'=>"wacDefectiveProductForm", 'caption'=>"次品单"),
//          'wacDefectiveProductFormItem'  => array('id'=>"22",'group'=>'1', 'name'=>"wacDefectiveProductFormItem", 'caption'=>"次品单子项"),
//          'wacDyeOrder'                  => array('id'=>"23",'group'=>'1', 'name'=>"wacDyeOrder", 'caption'=>"浆染单"),
//          'wacDyeOrderItem'              => array('id'=>"24",'group'=>'1', 'name'=>"wacDyeOrderItem", 'caption'=>"浆染单项目"),
//          'wacDyeOrderItemCottonConsume' => array('id'=>"25",'group'=>'1', 'name'=>"wacDyeOrderItemCottonConsume", 'caption'=>"浆染单项目棉纱消耗记录"),
//          'wacFactoryGoodsItem'          => array('id'=>"26",'group'=>'1', 'name'=>"wacFactoryGoodsItem", 'caption'=>"工厂货物子项"),
//          'wacFactoryParameter'          => array('id'=>"27",'group'=>'1', 'name'=>"wacFactoryParameter", 'caption'=>"工厂参数"),
//          'wacFactoryType'               => array('id'=>"28",'group'=>'1', 'name'=>"wacFactoryType", 'caption'=>"工厂类型"),
//          'wacFillingYarnArrangement'    => array('id'=>"29",'group'=>'1', 'name'=>"wacFillingYarnArrangement", 'caption'=>"纬纱排列"),
//          'wacFinalClothForm'            => array('id'=>"30",'group'=>'1', 'name'=>"wacFinalClothForm", 'caption'=>"成品单"),
//          'wacFinalClothFormItem'        => array('id'=>"31",'group'=>'1', 'name'=>"wacFinalClothFormItem", 'caption'=>"成品单子项"),
          'wacFormula'                   => array('id'=>"32",'group'=>'1', 'name'=>"wacFormula", 'caption'=>"计算公式"),
          'wacFreightSpace'              => array('id'=>"33",'group'=>'1', 'name'=>"wacFreightSpace", 'caption'=>"仓位"),
          'wacGoodsCategoryUnit'         => array('id'=>"34",'group'=>'1', 'name'=>"wacGoodsCategoryUnit", 'caption'=>"货物分类与单位关系表"),
//          'wacProductionOrder'           => array('id'=>"35",'group'=>'1', 'name'=>"wacProductionOrder", 'caption'=>"生产单"),
//          'wacProductionOrderCleanUpQcForm'  => array('id'=>"36",'group'=>'1', 'name'=>"wacProductionOrderCleanUpQcForm", 'caption'=>"生产单与整理QC关系表"),
//          'wacProductionOrderGoodsItem'      => array('id'=>"37",'group'=>'1', 'name'=>"wacProductionOrderGoodsItem", 'caption'=>"生产单货物子项"),
//          'wacProductionOrderWeaveQcForm'    => array('id'=>"38",'group'=>'1', 'name'=>"wacProductionOrderWeaveQcForm", 'caption'=>"生产单与织造QC关系表"),
//          'wacRawMaterial'                   => array('id'=>"39",'group'=>'1', 'name'=>"wacRawMaterial", 'caption'=>"原料"),

//          'wacStandard'                      => array('id'=>"40",'group'=>'1', 'name'=>"wacStandard", 'caption'=>"规格"),
//          'wacStorehouseGoodsItem'           => array('id'=>"41",'group'=>'1', 'name'=>"wacStorehouseGoodsItem", 'caption'=>"仓库货物子项"),
//          'wacStorehouseParameter'           => array('id'=>"42",'group'=>'1', 'name'=>"wacStorehouseParameter", 'caption'=>"仓库参数"),
//          'wacSupplier'                      => array('id'=>"43",'group'=>'1', 'name'=>"wacSupplier", 'caption'=>"供应商"),
//          'wacSupplierParameter'             => array('id'=>"44",'group'=>'1', 'name'=>"wacSupplierParameter", 'caption'=>"供应商参数"),
          'wacSystemLog'                     => array('id'=>"45",'group'=>'1', 'name'=>"wacSystemLog", 'caption'=>"系统日志"),
          'wacSystemParameter'               => array('id'=>"46",'group'=>'1', 'name'=>"wacSystemParameter", 'caption'=>"系统参数"),
          'wacUnit'                          => array('id'=>"47",'group'=>'1', 'name'=>"wacUnit", 'caption'=>"计量单位"),
//          'wacWarpArrangement'               => array('id'=>"48",'group'=>'1', 'name'=>"wacWarpArrangement", 'caption'=>"经纱排列"),
//          'wacWeaveOrder'                    => array('id'=>"49",'group'=>'1', 'name'=>"wacWeaveOrder", 'caption'=>"织造单"),
//          'wacWeaveOrderItem'                => array('id'=>"50",'group'=>'1', 'name'=>"wacWeaveOrderItem", 'caption'=>"织造单子项"),
//          'wacWeaveOrderItemCottonConsume'   => array('id'=>"51",'group'=>'1', 'name'=>"wacWeaveOrderItemCottonConsume", 'caption'=>"织造单项目棉纱消耗记录"),
//          'wacWeaveOrderItemWarpYarnConsume' => array('id'=>"52",'group'=>'1', 'name'=>"wacWeaveOrderItemWarpYarnConsume", 'caption'=>"织造单项目经纱消耗记录"),
//          'wacWeaveQcForm'                   => array('id'=>"53",'group'=>'1', 'name'=>"wacWeaveQcForm", 'caption'=>"织造QC单"),
//          'wacWeaveQcFormItem'               => array('id'=>"54",'group'=>'1', 'name'=>"wacWeaveQcFormItem", 'caption'=>"织造QC单子项"),
          'wacWorkflowItem'                  => array('id'=>"55",'group'=>'1', 'name'=>"wacWorkflowItem", 'caption'=>"工作流程子项"),

          'wacGuardPermission'               => array('id'=>"55",'group'=>'1', 'name'=>"wacGuardPermission", 'caption'=>"权限管理"),
          'wacGuardGroup'                    => array('id'=>"56",'group'=>'1', 'name'=>"wacGuardGroup", 'caption'=>"用户组管理"),
          'wacGuardUser'                     => array('id'=>"57",'group'=>'1', 'name'=>"wacGuardUser", 'caption'=>"用户管理"),

          'wacI18n'                          => array('id'=>"58",'group'=>'1', 'name'=>"wacI18n", 'caption'=>"多语言服务"),
          'wacPrint'                         => array('id'=>"59",'group'=>'1', 'name'=>"wacPrint", 'caption'=>"打印服务"),
          'wacFileManager'                   => array('id'=>"60",'group'=>'1', 'name'=>"wacFileManager", 'caption'=>"文件上传"),
          'wacTest'                          => array('id'=>"61",'group'=>'1', 'name'=>"wacTest", 'caption'=>"测试模块"),
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
