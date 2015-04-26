<?php
// Require the core Temboo PHP SDK and required libraries
require_once('php-sdk/src/temboo.php');

// Instantiate the session and Choreo
$session = new Temboo_Session('javathunderman', 'myFirstApp', '3f27d92b72974af99011e7bf79865109');
$getDefinitionsChoreo = new Wordnik_Word_GetDefinitions($session);

// Act as a proxy on behalf of the JavaScript SDK
$tembooProxy = new Temboo_Proxy();

// Add Choreo proxy with an ID matching that specified by the JS SDK client
$tembooProxy->addChoreo('jsGetDefinitions', $getDefinitionsChoreo);

// Set default input values
$tembooProxy->allowUserInputs('jsGetDefinitions', 'APIKey')->allowUserInputs('jsGetDefinitions', 'Word');

// Execute the Choreo
echo $tembooProxy->execute($_POST['temboo_proxy']);
?>