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
			BN_CMS_Content(Title, Body, Archived)
		VALUES
			(:title, :body, :archive)"
	);
	$query->bindParam(':title', $_POST['title']);
	$query->bindParam(':body', $_POST['body']);

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
		<h1>Content added!</h1>
		<a href="index.php">Okay</a>
	</body>
</html>
