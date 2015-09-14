<?php

	// Start PHP session
	session_start();

	// Check if user is logged in
	if (empty($_SESSION['admin_user'])) {

		// If not, redirect to login
		header('location: login.php');
		exit();
	}

?>