<?php
// module buttons bar
include_partial(WacModule::getName("printer")."/".WacControlTableType::$printButtonBar, array('invokeParams'=>$invokeParams));

echo "<div id=\"printTarget\">\n";
//echo "  <h2>Here's a sample of an element to print!</h2>\n";

// module buttons bar
include_component($invokeParams['pModule'], $invokeParams['pAction'],
        array('invokeParams' => $invokeParams)
);

echo "</div>\n";
//echo "<iframe id=\"printTarget\" name=\"printTarget\" frameBorder=\"0\" scrolling=\"auto\" src=\"{$invokeParams['path']}\" style=\"HEIGHT: {$invokeParams['height']}; VISIBILITY: inherit; WIDTH: 100%; Z-INDEX: 1\">\n";
//echo "</iframe>\n";

?>