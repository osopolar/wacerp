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

$wacModule = WacModule::getInstance();

$menuStr="";
$menuStr.="<rows>";
$menuStr.="<page>1</page>";
$menuStr.="<total>1</total>";
$menuStr.="<records>1</records>";
$menuStr.="<row><cell>20000</cell><cell>系统参数设置</cell><cell></cell><cell>0</cell><cell>20000</cell><cell>21000</cell><cell>false</cell><cell>false</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacCountry", "uiPanelId")."</cell><cell>国家</cell><cell>wacCountry/index?uiApp=".$contextInfo["moduleName"]."</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacLanguage", "uiPanelId")."</cell><cell>语言</cell><cell>wacLanguage/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacSysmsg", "uiPanelId")."</cell><cell>系统信息</cell><cell>wacSysmsg/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacUnit", "uiPanelId")."</cell><cell>计量单位</cell><cell>wacUnit/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacCurrency", "uiPanelId")."</cell><cell>货币单位</cell><cell>wacCurrency/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacSystemParameter", "uiPanelId")."</cell><cell>默认参数</cell><cell>wacSystemParameter/index</cell><cell>1</cell><cell>20001</cell><cell>20002</cell><cell>true</cell><cell>true</cell></row>";

$menuStr.="<row><cell>21001</cell><cell>系统工具</cell><cell></cell><cell>0</cell><cell>21001</cell><cell>22000</cell><cell>false</cell><cell>false</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacSystemLog", "uiPanelId")."</cell><cell>工作日志</cell><cell>wacSystemLog/index</cell><cell>1</cell><cell>21002</cell><cell>21003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacFileManager", "uiPanelId")."</cell><cell>文件管理</cell><cell>wacFileManager/index</cell><cell>1</cell><cell>21002</cell><cell>21003</cell><cell>true</cell><cell>true</cell></row>";

$menuStr.="<row><cell>22001</cell><cell>业务参数设置</cell><cell></cell><cell>0</cell><cell>22001</cell><cell>23000</cell><cell>false</cell><cell>false</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacCategory", "uiPanelId")."</cell><cell>分类</cell><cell>wacCategory/index?uiApp=".$contextInfo["moduleName"]."</cell><cell>1</cell><cell>22002</cell><cell>22003</cell><cell>true</cell><cell>true</cell></row>";

$menuStr.="<row><cell>23001</cell><cell>用户管理</cell><cell></cell><cell>0</cell><cell>23001</cell><cell>24000</cell><cell>false</cell><cell>false</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacGuardUser", "uiPanelId")."</cell><cell>用户管理列表</cell><cell>wacGuardUser/index</cell><cell>1</cell><cell>23002</cell><cell>23003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacGuardGroup", "uiPanelId")."</cell><cell>用户组管理列表</cell><cell>wacGuardGroup/index</cell><cell>1</cell><cell>23002</cell><cell>23003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="<row><cell>".$wacModule->getAttribute("wacGuardPermission", "uiPanelId")."</cell><cell>权限管理列表</cell><cell>wacGuardPermission/index</cell><cell>1</cell><cell>23002</cell><cell>23003</cell><cell>true</cell><cell>true</cell></row>";
$menuStr.="</rows>";
echo $menuStr;
?>