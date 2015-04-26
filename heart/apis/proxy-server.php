<?php
// Require the core Temboo PHP SDK and required libraries
require_once('php-sdk/src/temboo.php');

// Instantiate the session and Choreo
$session = new Temboo_Session('javathunderman', 'myFirstApp', '3f27d92b72974af99011e7bf79865109');
$queryChoreo = new WolframAlpha_Query($session);

// Act as a proxy on behalf of the JavaScript SDK
$tembooProxy = new Temboo_Proxy();

// Add Choreo proxy with an ID matching that specified by the JS SDK client
$tembooProxy->addChoreo('jsQuery', $queryChoreo);

// Set default input values
$tembooProxy->allowUserInputs('jsQuery', 'Input')->allowUserInputs('jsQuery', 'AppID');

// Execute the Choreo
echo $tembooProxy->execute($_POST['temboo_proxy']);
?>