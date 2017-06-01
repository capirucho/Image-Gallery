<?php

	require_once("includes/header.php");

	$session->logout();
	redirectUser("login.php");

?>
