<?php
if($user->hasCredential("app_system_setting"))
{
    echo "<li id=\"btnAppNavStorehouse\"><a href=\"#appStorehouse\" ><span>布匹生产流程</span></a></li>\n";
}

if($user->hasCredential("app_cloth_produce"))
{
    echo "<li id=\"btnAppNavSystem\"><a href=\"#appSystemManagement\" ><span>系统设置</span></a></li>\n";
}

//     echo "<li id=\"btnAppNavOther\"><a href=\"#appOthers\" ><span>Others</span></a></li>\n";
?>
