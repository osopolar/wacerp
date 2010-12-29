<?php
/*
 * embed other partial/component to the tpl via this component
 */

// setup current component invokeParams
sfContext::getInstance()->set("wac/component/invokeParams", $invokeParams);

if (isset($mode) && $mode == "partial") {
    include_partial("{$widgetModule}/{$widgetName}", array('invokeParams'=>$invokeParams));
} else {
    include_component($widgetModule, $widgetName, array('invokeParams'=>$invokeParams));
}
?>