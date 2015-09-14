<?php

	// Check that admin user is logged in
	include 'admin.php';

	// Include settings
	include '../settings.php';

	// Open connection to database
	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	// Insert content
	$query = $db_connection->prepare(
		"UPDATE BN_CMS_ExternalPages
		SET Name=:name, Link=:link
		WHERE ID=:id"
	);
	$query->bindParam(':name', $_POST['name']);
	$query->bindParam(':link', $_POST['link']);
	$query->bindParam(':id', $_POST['id']);

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