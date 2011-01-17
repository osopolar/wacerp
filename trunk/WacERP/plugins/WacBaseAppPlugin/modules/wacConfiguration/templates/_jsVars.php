<?php
if(isset($frontendConfigs) && count($frontendConfigs)>0){
    $pattern = "var %s = '%s';\n";
    foreach($frontendConfigs as $k=>$v){
        printf($pattern, $k, $v);
    }
}
?>