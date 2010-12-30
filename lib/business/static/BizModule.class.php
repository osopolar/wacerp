<?php
/**
 * Description of WacModule
 *
 * @author ben
 */
class BizModule
{
    public static $params = array(
          'common'         => array('id'=>"0", 'group'=>'1', 'name'=>"common", 'caption'=>"公共模块"),
          'jar'            => array('id'=>"1", 'group'=>'1', 'name'=>"jar", 'caption'=>"浆次缸号"),
          'axis'           => array('id'=>"2", 'group'=>'1', 'name'=>"axis", 'caption'=>"轴号"),
          'spinner'        => array('id'=>"3", 'group'=>'1', 'name'=>"spinner", 'caption'=>"纺纱机"),
          'factory'        => array('id'=>"4", 'group'=>'1', 'name'=>"factory", 'caption'=>"工厂"),
          'storehouse'     => array('id'=>"5", 'group'=>'1', 'name'=>"storehouse", 'caption'=>"仓库"),
          'goodsCategory'  => array('id'=>"6", 'group'=>'1', 'name'=>"goodsCategory", 'caption'=>"物料分类"),
          'country'        => array('id'=>"7", 'group'=>'1', 'name'=>"country", 'caption'=>"国家"),
          'language'       => array('id'=>"8", 'group'=>'1', 'name'=>"language", 'caption'=>"语言"),
          'sysmsg'         => array('id'=>"9", 'group'=>'1', 'name'=>"sysmsg", 'caption'=>"系统信息"),
          'color'          => array('id'=>"10",'group'=>'1', 'name'=>"color", 'caption'=>"颜色"),

          'businessLog'          => array('id'=>"11",'group'=>'1', 'name'=>"businessLog", 'caption'=>"商业操作日志"),
          'cleanUpForm'          => array('id'=>"12",'group'=>'1', 'name'=>"cleanUpForm", 'caption'=>"后整单"),
          'cleanUpFormItem'      => array('id'=>"13",'group'=>'1', 'name'=>"cleanUpFormItem", 'caption'=>"后整单子项"),
          'cleanUpQcForm'        => array('id'=>"14",'group'=>'1', 'name'=>"cleanUpQcForm", 'caption'=>"后整QC单"),
          'cleanUpQcFormItem'    => array('id'=>"15",'group'=>'1', 'name'=>"cleanUpQcFormItem", 'caption'=>"后整QC单项目"),
          'cottonOrder'          => array('id'=>"16",'group'=>'1', 'name'=>"cottonOrder", 'caption'=>"棉纱单"),
          'cottonOrderGoodsItem' => array('id'=>"17",'group'=>'1', 'name'=>"cottonOrderGoodsItem", 'caption'=>"棉纱单物料子项"),
          'currency'             => array('id'=>"18",'group'=>'1', 'name'=>"currency", 'caption'=>"货币"),
          'customer'             => array('id'=>"19",'group'=>'1', 'name'=>"customer", 'caption'=>"客户"),
          'customerParameter'    => array('id'=>"20",'group'=>'1', 'name'=>"customerParameter", 'caption'=>"客户参数"),
          'defectiveProductForm' => array('id'=>"21",'group'=>'1', 'name'=>"defectiveProductForm", 'caption'=>"次品单"),
          'defectiveProductFormItem'  => array('id'=>"22",'group'=>'1', 'name'=>"defectiveProductFormItem", 'caption'=>"次品单子项"),
          'dyeOrder'                  => array('id'=>"23",'group'=>'1', 'name'=>"dyeOrder", 'caption'=>"浆染单"),
          'dyeOrderItem'              => array('id'=>"24",'group'=>'1', 'name'=>"dyeOrderItem", 'caption'=>"浆染单项目"),
          'dyeOrderItemCottonConsume' => array('id'=>"25",'group'=>'1', 'name'=>"dyeOrderItemCottonConsume", 'caption'=>"浆染单项目棉纱消耗记录"),
          'factoryGoodsItem'          => array('id'=>"26",'group'=>'1', 'name'=>"factoryGoodsItem", 'caption'=>"工厂物料子项"),
          'factoryParameter'          => array('id'=>"27",'group'=>'1', 'name'=>"factoryParameter", 'caption'=>"工厂参数"),
          'factoryType'               => array('id'=>"28",'group'=>'1', 'name'=>"factoryType", 'caption'=>"工厂类型"),
          'fillingYarnArrangement'    => array('id'=>"29",'group'=>'1', 'name'=>"fillingYarnArrangement", 'caption'=>"纬纱排列"),
          'finalClothForm'            => array('id'=>"30",'group'=>'1', 'name'=>"finalClothForm", 'caption'=>"成品单"),
          'finalClothFormItem'        => array('id'=>"31",'group'=>'1', 'name'=>"finalClothFormItem", 'caption'=>"成品单子项"),
          'formula'                   => array('id'=>"32",'group'=>'1', 'name'=>"formula", 'caption'=>"计算公式"),
          'freightSpace'              => array('id'=>"33",'group'=>'1', 'name'=>"freightSpace", 'caption'=>"仓位"),
          'goodsCategoryUnit'         => array('id'=>"34",'group'=>'1', 'name'=>"goodsCategoryUnit", 'caption'=>"物料分类与单位关系表"),
          'productionOrder'           => array('id'=>"35",'group'=>'1', 'name'=>"productionOrder", 'caption'=>"生产单"),
          'productionOrderCleanUpQcForm'  => array('id'=>"36",'group'=>'1', 'name'=>"productionOrderCleanUpQcForm", 'caption'=>"生产单与后整QC关系表"),
          'productionOrderGoodsItem'      => array('id'=>"37",'group'=>'1', 'name'=>"productionOrderGoodsItem", 'caption'=>"生产单物料子项"),
          'productionOrderWeaveQcForm'    => array('id'=>"38",'group'=>'1', 'name'=>"productionOrderWeaveQcForm", 'caption'=>"生产单与织造QC关系表"),
          'rawMaterial'                   => array('id'=>"39",'group'=>'1', 'name'=>"rawMaterial", 'caption'=>"原料"),
          
          'standard'                      => array('id'=>"40",'group'=>'1', 'name'=>"standard", 'caption'=>"规格"),
          'storehouseGoodsItem'           => array('id'=>"41",'group'=>'1', 'name'=>"storehouseGoodsItem", 'caption'=>"仓库物料子项"),
          'storehouseParameter'           => array('id'=>"42",'group'=>'1', 'name'=>"storehouseParameter", 'caption'=>"仓库参数"),
          'supplier'                      => array('id'=>"43",'group'=>'1', 'name'=>"supplier", 'caption'=>"供应商"),
          'supplierParameter'             => array('id'=>"44",'group'=>'1', 'name'=>"supplierParameter", 'caption'=>"供应商参数"),
          'systemLog'                     => array('id'=>"45",'group'=>'1', 'name'=>"systemLog", 'caption'=>"系统日志"),
          'systemParameter'               => array('id'=>"46",'group'=>'1', 'name'=>"systemParameter", 'caption'=>"系统参数"),
          'unit'                          => array('id'=>"47",'group'=>'1', 'name'=>"unit", 'caption'=>"计量单位"),
          'warpArrangement'               => array('id'=>"48",'group'=>'1', 'name'=>"warpArrangement", 'caption'=>"经纱排列"),
          'weaveOrder'                    => array('id'=>"49",'group'=>'1', 'name'=>"weaveOrder", 'caption'=>"织造单"),
          'weaveOrderItem'                => array('id'=>"50",'group'=>'1', 'name'=>"weaveOrderItem", 'caption'=>"织造单子项"),
          'weaveOrderItemCottonConsume'   => array('id'=>"51",'group'=>'1', 'name'=>"weaveOrderItemCottonConsume", 'caption'=>"织造单项目棉纱消耗记录"),
          'weaveOrderItemWarpYarnConsume' => array('id'=>"52",'group'=>'1', 'name'=>"weaveOrderItemWarpYarnConsume", 'caption'=>"织造单项目经纱消耗记录"),
          'weaveQcForm'                   => array('id'=>"53",'group'=>'1', 'name'=>"weaveQcForm", 'caption'=>"织造QC单"),
          'weaveQcFormItem'               => array('id'=>"54",'group'=>'1', 'name'=>"weaveQcFormItem", 'caption'=>"织造QC单子项"),
          'workflowItem'                  => array('id'=>"55",'group'=>'1', 'name'=>"workflowItem", 'caption'=>"工作流程子项"),
          'printer'                       => array('id'=>"56",'group'=>'1', 'name'=>"printer", 'caption'=>"打印服务"),
          'customerOrder'                 => array('id'=>"57",'group'=>'1', 'name'=>"customerOrder", 'caption'=>"订单"),
          'sampleJar'                     => array('id'=>"58", 'group'=>'1', 'name'=>"sampleJar", 'caption'=>"封样缸号"),
          'wacGuardUser'                  => array('id'=>"59", 'group'=>'1', 'name'=>"wacGuardUser", 'caption'=>"用户"),
          'wacGuardGroup'                 => array('id'=>"60", 'group'=>'1', 'name'=>"wacGuardGroup", 'caption'=>"用户组"),
          'wacGuardPermission'            => array('id'=>"61", 'group'=>'1', 'name'=>"wacGuardPermission", 'caption'=>"用户权限"),
          'wrapper'                       => array('id'=>"62", 'group'=>'1', 'name'=>"wrapper", 'caption'=>"包装"),

          'statistic'                     => array('id'=>"63", 'group'=>'1', 'name'=>"statistic", 'caption'=>"查询与统计"),
          'statisticFactory'              => array('id'=>"64", 'group'=>'1', 'name'=>"statisticFactory", 'caption'=>"工厂库存"),
          'dispatchOrder'                 => array('id'=>"65", 'group'=>'1', 'name'=>"dispatchOrder", 'caption'=>"出货单"),
          'goods'                         => array('id'=>"66", 'group'=>'1', 'name'=>"goods", 'caption'=>"物料"),
          'stockGoodsStatement'           => array('id'=>"67", 'group'=>'1', 'name'=>"stockGoodsStatement", 'caption'=>"物料进出明细项"),

          'finalClothQcWrapperForm'        => array('id'=>"68", 'group'=>'1', 'name'=>"finalClothQcWrapperForm", 'caption'=>"成品检验包装单"),
          'finalClothQcTestForm'           => array('id'=>"69", 'group'=>'1', 'name'=>"finalClothQcTestForm", 'caption'=>"成品测试记录表"),
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

    /*
     * get attribute
     */
    public static function getAttribute($module, $attribute)
    {
        return self::$params[$module][$attribute];
    }

    /*
     * getId
     */
    public static function getId($module)
    {
        return self::getAttribute($module, 'id');
    }

    /*
     * getName
     */
    public static function getName($module)
    {
        return self::getAttribute($module, 'name');
    }

    /*
     * getCaption
     */
    public static function getCaption($module)
    {
        return self::getAttribute($module, 'caption');
    }

}
