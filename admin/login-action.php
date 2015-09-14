<?php

	// Check submitted username and password
	if ($_POST['username'] == 'USERNAME' && $_POST['password'] == 'PASSWORD') {

		// Set "user logged in" flag
		session_start();
		$_SESSION['admin_user'] = TRUE;

		// Redirect to menu
		header('location: index.php');
		exit();
	}

	// Login failed!
	header('location: login.php');
	exit();

?>