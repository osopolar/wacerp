<?php

//install layout component
    include_component($contextInfo["moduleName"], "layout",
            array("contextInfo" => $contextInfo)
    );

//load main js after sub components are loaded finish
    use_javascript($contextInfo["componentJs"]);
?>