<?php

	// Check that admin user is logged in
	include 'admin.php';

	// Include settings
	include '../settings.php';

	// Open connection to database
	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	// Insert content
	$query = $db_connection->prepare(
		"INSERT INTO 
			BN_CMS_ExternalPages(Name, Link)
		VALUES
			(:name, :link)"
	);
	
	$query->bindParam(':name', $_POST['name']);
	$query->bindParam(':link', $_POST['link']);
	$query->execute();

	// Done!

?><!DOCTYPE HTML>
<html>
	<head>
		<title>Install Taloo CMS</title>
	</head>
	<body>
		<h1>Content added!</h1>
		<a href="index.php">Okay</a>
	</body>
</html>
