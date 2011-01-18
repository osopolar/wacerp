<?php

$appEnv = array(
    "baseUrl" => $sf_request->getUriPrefix().url_for('@homepage'),
    "culture" => sfConfig::get("sf_default_culture"),
);

$wacSettingStr = "";
// global vars
if (isset($frontendConfigs["wac_setting"]) && count($frontendConfigs["wac_setting"]) > 0) {
    $pattern = "%s: '%s',\n";
    foreach ($frontendConfigs["wac_setting"] as $k => $v) {
        $wacSettingStr.= sprintf($pattern, $k, $v);
    }
}

// events
if (isset($frontendConfigs["wac_events"]) && count($frontendConfigs["wac_events"]) > 0) {
    $pattern = "  %s: '%s',\n";
    $wacSettingStr.= "  event:{\n";
    foreach ($frontendConfigs["wac_events"] as $k => $v) {
        $wacSettingStr.= sprintf($pattern, $k, $v);
    }
    $wacSettingStr = substr($wacSettingStr, 0, -2);  //remove last ',\n'
    $wacSettingStr.= "\n  }\n";
}

echo <<<END
// define a global app environment object, connected with server side config
var WacAppConfig = {
  baseUrl: '{$appEnv["baseUrl"]}',
  culture: '{$appEnv["culture"]}',
  {$wacSettingStr}
}
END;
?>