<?php
/**
 * Description of WacTable
 *
 * @author ben
 *
 * main module <-> table mapping
 */
class WacTable {
//    public static $wacAxis = "WacAxis";
//    public static $wacBusinessLog = "WacBusinessLog";
//    public static $wacCleanUpForm = "WacCleanUpForm";
//    public static $wacCleanUpFormItem = "WacCleanUpFormItem";
//    public static $wacCleanUpQcForm = "WacCleanUpQcForm";
//    public static $wacCleanUpQcFormItem = "WacCleanUpQcFormItem";
//    public static $wacColor = "WacColor";
//    public static $wacCottonOrder = "WacCottonOrder";
//    public static $wacCottonOrderGoodsItem = "WacCottonOrderGoodsItem";
    public static $wacCountry = "WacCountry";
    public static $wacCurrency = "WacCurrency";
//    public static $wacCustomer = "WacCustomer";
//    public static $wacCustomerParameter = "WacCustomerParameter";
//    public static $wacDefectiveProductForm = "WacDefectiveProductForm";
//    public static $wacDefectiveProductFormItem = "WacDefectiveProductFormItem";
//    public static $wacDyeOrder = "WacDyeOrder";
//    public static $wacDyeOrderItem = "WacDyeOrderItem";
//    public static $wacDyeOrderItemCottonConsume = "WacDyeOrderItemCottonConsume";
//    public static $wacFactory = "WacFactory";
//    public static $wacFactoryGoodsItem = "WacFactoryGoodsItem";
//    public static $wacFactoryParameter = "WacFactoryParameter";
//    public static $wacFactoryType = "WacFactoryType";
//    public static $wacFillingYarnArrangement = "WacFillingYarnArrangement";
//    public static $wacFinalClothForm = "WacFinalClothForm";
//    public static $wacFinalClothFormItem = "WacFinalClothFormItem";
//    public static $wacFormula = "WacFormula";
//    public static $wacFreightSpace = "WacFreightSpace";
//    public static $wacGoodsCategory = "WacGoodsCategory";
//    public static $wacGoodsCategoryUnit = "WacGoodsCategoryUnit";
//    public static $wacJar = "WacJar";
    public static $wacLanguage = "WacLanguage";
//    public static $wacCustomerOrder = "WacCustomerOrder";
//    public static $wacProductionOrder = "WacProductionOrder";
//    public static $wacProductionOrderCleanUpQcForm = "WacProductionOrderCleanUpQcForm";
//    public static $wacProductionOrderGoodsItem = "WacProductionOrderGoodsItem";
//    public static $wacProductionOrderWeaveQcForm = "WacProductionOrderWeaveQcForm";
//    public static $wacRawMaterial = "WacRawMaterial";
//    public static $wacSpinner = "WacSpinner";
//    public static $wacStandard = "WacStandard";
//    public static $wacStorehouse = "WacStorehouse";
//    public static $wacStorehouseGoodsItem = "WacStorehouseGoodsItem";
//    public static $wacStorehouseParameter = "WacStorehouseParameter";
//    public static $wacSupplier = "WacSupplier";
//    public static $wacSupplierParameter = "WacSupplierParameter";
    public static $wacSysmsg = "WacSysmsg";
    public static $wacSystemLog = "WacSystemLog";
    public static $wacSystemParameter = "WacSystemParameter";
    public static $wacTemplate = "WacTemplate";
    public static $wacUnit = "WacUnit";
//    public static $wacWarpArrangement = "WacWarpArrangement";
//    public static $wacWeaveOrder = "WacWeaveOrder";
//    public static $wacWeaveOrderItem = "WacWeaveOrderItem";
//    public static $wacWeaveOrderItemCottonConsume = "WacWeaveOrderItemCottonConsume";
//    public static $wacWeaveOrderItemWarpYarnConsume = "WacWeaveOrderItemWarpYarnConsume";
//    public static $wacWeaveQcForm = "WacWeaveQcForm";
//    public static $wacWeaveQcFormItem = "WacWeaveQcFormItem";
    public static $wacWorkflow = "WacWorkflow";
    public static $wacWorkflowItem = "WacWorkflowItem";
//    public static $wacProductionOrderEstimateGoodsItem = "WacProductionOrderEstimateGoodsItem";
//    public static $wacSampleJar = "WacSampleJar";
//    public static $wacWrapper = "WacWrapper";

//    public static $wacGuardUser = "sfGuarduser";
//    public static $wacGuardGroup = "sfGuardGroup";
//    public static $wacGuardPermission = "sfGuardPermission";
    public static $wacGuardUser       = "WacGuardUser";
    public static $wacGuardGroup      = "WacGuardGroup";
    public static $wacGuardPermission = "WacGuardPermission";
    public static $wacUserParameter   = "WacUserParameter";

//    public static $wacGoods = "WacGoods";
//    public static $wacDispatchOrder = "WacDispatchOrder";
//    public static $wacDispatchOrderItem = "WacDispatchOrderItem";

//    public static $wacStockGoodsStatement = "WacStockGoodsStatement";
    public static $wacUnitType = "WacUnitType";
    public static $wacUnitRatio = "WacUnitRatio";
    public static $wacCurrencyRatio = "WacCurrencyRatio";

    public static $wacFileManager = "WacFile";
    public static $wacCategory = "WacCategory";


    /*
     * e.g. : WacGoods -> wac_goods
     */
    public static function getTableName($str)
    {
        return strtolower(preg_replace('/([^\s])([A-Z])/', '\1_\2', $str));
    }

    public static function getTableByModule($module){
        return self::$$module;
    }

}
