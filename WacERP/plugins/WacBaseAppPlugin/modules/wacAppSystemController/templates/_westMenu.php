<?php
// logic:
// * The first parents left_field must be = to it's id and 0 (unless set otherwise).
// * The first parent right_field must be = this parent last child id + 1
// * The first child left_field must be = the parent id + 1
// * The first child right_field must be = its' left field + 1
// * Each progressive childs left_field must = the previous childs right_field
// * Each progressive childs right_field must = this childs left_field + 1
// * Each progressive parents left_field must = the previous Parents last childs' left_field + 1
// * Each progressive parents right_field must = its' left_field + 1
//As an additional note the level_field is for "indentation"…  0 = baseline, 1 indent = 1 space, 2 = indent 2 spaces…

$menuStr="";
$menuStr.="<rows>";
$menuStr.="<page>1</page>";
$menuStr.="<total>1</total>";
$menuStr.="<records>1</records>";
$menuStr.="<row><cell>20000</cell><cell>系统参数设置</cell><cell></cell><cell>0</cell><cell>20000</cell><cell>21000</cell><cell>false</cell><cell>false</cell></row>";
$menuStr.="<row><cell>20001</cell><cell>工作流程</cell><cell>wacWorkflow/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>20002</cell><cell>国家</cell><cell>wacCountry/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>20003</cell><cell>语言</cell><cell>wacLanguage/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>20004</cell><cell>系统信息</cell><cell>wacSysmsg/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>20005</cell><cell>计算单位</cell><cell>wacUnit/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>20006</cell><cell>货币单位</cell><cell>wacCurrency/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>20007</cell><cell>默认参数</cell><cell>wacSystemParameter/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";

$menuStr.="<row><cell>21001</cell><cell>系统工具</cell><cell></cell><cell>0</cell><cell>21001</cell><cell>22000</cell><cell>false</cell><cell>false</cell></row>";
$menuStr.="<row><cell>21002</cell><cell>工作日志</cell><cell>wacSystemLog/index</cell><cell>1</cell><cell>21002</cell><cell>21003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>21003</cell><cell>文件管理</cell><cell>wacFileManager/index</cell><cell>1</cell><cell>21002</cell><cell>21003</cell><cell>true</cell><cell>true</cell></row>";

$menuStr.="<row><cell>22001</cell><cell>运行参数设置</cell><cell></cell><cell>0</cell><cell>22001</cell><cell>23000</cell><cell>false</cell><cell>false</cell></row>";
//$menuStr.="<row><cell>22002</cell><cell>工厂</cell><cell>factory/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22003</cell><cell>工厂类型</cell><cell>factoryType/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22004</cell><cell>工厂参数</cell><cell>factoryParameter/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22005</cell><cell>仓库</cell><cell>storehouse/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22006</cell><cell>仓库参数</cell><cell>storehouseParameter/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>22007</cell><cell>货物名录</cell><cell>wacGoods/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>22008</cell><cell>货物分类</cell><cell>wacGoodsCategory/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22009</cell><cell>浆次缸号</cell><cell>jar/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22010</cell><cell>封样缸号</cell><cell>sampleJar/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22011</cell><cell>颜色</cell><cell>color/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22012</cell><cell>轴号</cell><cell>axis/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22013</cell><cell>纺纱机</cell><cell>spinner/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22014</cell><cell>规格</cell><cell>standard/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22015</cell><cell>经纱排列</cell><cell>warpArrangement/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22016</cell><cell>纬纱排列</cell><cell>fillingYarnArrangement/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22017</cell><cell>原材料</cell><cell>rawMaterial/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22018</cell><cell>供应商</cell><cell>supplier/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22019</cell><cell>客户</cell><cell>customer/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";
//$menuStr.="<row><cell>22020</cell><cell>包装</cell><cell>wrapper/index</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";

$menuStr.="<row><cell>23001</cell><cell>用户管理</cell><cell></cell><cell>0</cell><cell>23001</cell><cell>24000</cell><cell>false</cell><cell>false</cell></row>";
$menuStr.="<row><cell>23002</cell><cell>用户管理列表</cell><cell>wacGuardUser/index</cell><cell>1</cell><cell>23002</cell><cell>23003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>23003</cell><cell>用户组管理列表</cell><cell>wacGuardGroup/index</cell><cell>1</cell><cell>23002</cell><cell>23003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>23004</cell><cell>权限管理列表</cell><cell>wacGuardPermission/index</cell><cell>1</cell><cell>23002</cell><cell>23003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="</rows>";
echo $menuStr;
?>