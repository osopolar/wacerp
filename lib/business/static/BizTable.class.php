<?php
/**
 * Description of BizTable
 *
 * @author ben
 */
class BizTable {
//    public static $axis = "WacAxis";
//    public static $businessLog = "WacBusinessLog";
//    public static $cleanUpForm = "WacCleanUpForm";
//    public static $cleanUpFormItem = "WacCleanUpFormItem";
//    public static $cleanUpQcForm = "WacCleanUpQcForm";
//    public static $cleanUpQcFormItem = "WacCleanUpQcFormItem";
//    public static $color = "WacColor";
//    public static $cottonOrder = "WacCottonOrder";
//    public static $cottonOrderGoodsItem = "WacCottonOrderGoodsItem";
//    public static $country = "WacCountry";
//    public static $currency = "WacCurrency";
//    public static $customer = "WacCustomer";
//    public static $customerParameter = "WacCustomerParameter";
//    public static $defectiveProductForm = "WacDefectiveProductForm";
//    public static $defectiveProductFormItem = "WacDefectiveProductFormItem";
//    public static $dyeOrder = "WacDyeOrder";
//    public static $dyeOrderItem = "WacDyeOrderItem";
//    public static $dyeOrderItemCottonConsume = "WacDyeOrderItemCottonConsume";
//    public static $factory = "WacFactory";
//    public static $factoryGoodsItem = "WacFactoryGoodsItem";
//    public static $factoryParameter = "WacFactoryParameter";
//    public static $factoryType = "WacFactoryType";
//    public static $fillingYarnArrangement = "WacFillingYarnArrangement";
//    public static $finalClothForm = "WacFinalClothForm";
//    public static $finalClothFormItem = "WacFinalClothFormItem";
//    public static $formula = "WacFormula";
//    public static $freightSpace = "WacFreightSpace";
//    public static $goodsCategory = "WacGoodsCategory";
//    public static $goodsCategoryUnit = "WacGoodsCategoryUnit";
//    public static $jar = "WacJar";
//    public static $language = "WacLanguage";
//    public static $customerOrder = "WacCustomerOrder";
//    public static $productionOrder = "WacProductionOrder";
//    public static $productionOrderCleanUpQcForm = "WacProductionOrderCleanUpQcForm";
//    public static $productionOrderGoodsItem = "WacProductionOrderGoodsItem";
//    public static $productionOrderWeaveQcForm = "WacProductionOrderWeaveQcForm";
//    public static $rawMaterial = "WacRawMaterial";
//    public static $spinner = "WacSpinner";
//    public static $standard = "WacStandard";
//    public static $storehouse = "WacStorehouse";
//    public static $storehouseGoodsItem = "WacStorehouseGoodsItem";
//    public static $storehouseParameter = "WacStorehouseParameter";
//    public static $supplier = "WacSupplier";
//    public static $supplierParameter = "WacSupplierParameter";
    public static $sysmsg = "WacSysmsg";
    public static $systemLog = "WacSystemLog";
    public static $systemParameter = "WacSystemParameter";
    public static $template = "WacTemplate";
    public static $unit = "WacUnit";
//    public static $warpArrangement = "WacWarpArrangement";
//    public static $weaveOrder = "WacWeaveOrder";
//    public static $weaveOrderItem = "WacWeaveOrderItem";
//    public static $weaveOrderItemCottonConsume = "WacWeaveOrderItemCottonConsume";
//    public static $weaveOrderItemWarpYarnConsume = "WacWeaveOrderItemWarpYarnConsume";
//    public static $weaveQcForm = "WacWeaveQcForm";
//    public static $weaveQcFormItem = "WacWeaveQcFormItem";
//    public static $workflow = "WacWorkflow";
//    public static $workflowItem = "WacWorkflowItem";
//    public static $productionOrderEstimateGoodsItem = "WacProductionOrderEstimateGoodsItem";
//    public static $sampleJar = "WacSampleJar";
//    public static $wrapper = "WacWrapper";
//    public static $wacGuardUser = "sfGuarduser";
//    public static $wacGuardGroup = "sfGuardGroup";
//    public static $wacGuardPermission = "sfGuardPermission";
//
//    public static $goods = "WacGoods";
//    public static $dispatchOrder = "WacDispatchOrder";
//    public static $dispatchOrderItem = "WacDispatchOrderItem";
//
//    public static $stockGoodsStatement = "WacStockGoodsStatement";
//    public static $unitType = "WacUnitType";
//    public static $unitRatio = "WacUnitRatio";
//    public static $currencyRatio = "WacCurrencyRatio";
//
//    public static $cleanUpFormItemConsume = "WacCleanUpFormItemConsume";
//    public static $finalClothFormItemConsume = "WacFinalClothFormItemConsume";
//
//    public static $finalClothQcWrapperForm = "WacFinalClothQcWrapperForm";
//    public static $finalClothQcTestForm = "WacFinalClothQcTestForm";
//    public static $finalClothQcTestFormItem = "WacFinalClothQcTestFormItem";
//    public static $finalClothQcTestHistory = "WacFinalClothQcTestHistory";


    /*
     * e.g. : WacGoods -> wac_goods
     */
    public static function getTableName($str)
    {
        return strtolower(preg_replace('/([^\s])([A-Z])/', '\1_\2', $str));
    }

}
