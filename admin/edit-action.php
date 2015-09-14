<?php

	// Check that admin user is logged in
	include 'admin.php';

	// Include settings
	include '../settings.php';

	// Open connection to database
	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	// Insert content
	$query = $db_connection->prepare(
		"UPDATE BN_CMS_Content
		SET Title=:title, Body=:body, Archived=:archive
		WHERE ID=:id"
	);
	$query->bindParam(':title', $_POST['title']);
	$query->bindParam(':body', $_POST['body']);
	$query->bindParam(':id', $_POST['id']);

	if(isset($_POST['formWheelchair']) && $_POST['formWheelchair'] == 'Yes'){
		$query->bindParam(':archive', $a = 1);
	}else{
		$query->bindParam(':archive', $a = 0);
	}

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