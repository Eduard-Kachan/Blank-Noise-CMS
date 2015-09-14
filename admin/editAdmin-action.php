<?php

	// Check that admin user is logged in
	include 'admin.php';

	// Include settings
	include '../settings.php';

	// Open connection to database
	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	// Insert content
	$query = $db_connection->prepare(
		"UPDATE BN_CMS_Admin
		SET FullName=:fullName, Email=:email, About=:about
		WHERE ID = 1"
	);
	$query->bindParam(':fullName', $_POST['fullName']);
	$query->bindParam(':email', $_POST['email']);
	$query->bindParam(':about', $_POST['about']);
	$query->execute();

	// Done!

?><!DOCTYPE HTML>
<html>
	<head>
		<title>Install Taloo CMS</title>
	</head>
	<body>
		<h1>Content Edited</h1>
		<a href="index.php">Okay</a>
	</body>
</html>