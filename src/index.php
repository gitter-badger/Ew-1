<?php
	// Initialize the session
	session_start();
	
	// Include the configuration file
	include("assets/config.php");
	
	if(isset($_GET["msg"])) {
		$msg = $_GET["msg"];
	}
	
	if(isset($_SESSION["login"]) || isset($_SESSION["username"])) {
		// User is already logged in
		header("Location: " . $main_url . "/assets/dashboard.php?PHPSESSID=" . session_id());
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Home - Edlightened Web</title>
		<link type="text/css" rel="stylesheet" href="assets/css/main.css" />
		<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css" />
		<script type="text/javascript" src="assets/js/bootstrap.js"><?php if(isset($msg)) {echo "alert('" . $msg . "');";} ?></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
	
	<body>
		<h1><img src="http://edlightened.tk/forums/images/logo.png" alt="Edlightened" /></h1>
		<hr />
		<br />
		<h2>Please login below</h2>
		<br />
		<div class="container-fluid">
		<form name="login" method="post" action="assets/api.php?a=login">
			<input type="text" name="username" placeholder="Username" />
			<br />
			<input type="password" name="password" placeholder="Password" />
			<br />
			<input type="submit" class="btn btn-medium btn-primary" value="Login" />
		</form>
		</div>
		<br />
		<br />
		<hr />
		<br />
		<strong>Created by javathunderman. </strong>
	</body>

</html>
