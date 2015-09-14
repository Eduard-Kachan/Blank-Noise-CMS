<?php

	// Include settings
	include 'settings.php';

	// Open connection to database
	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	// Create database table
	$db_connection->query(
		"CREATE TABLE BN_CMS_Content(
			ID INT AUTO_INCREMENT,
			Title VARCHAR(255),
			Body TEXT,
			Archived BOOL,
			PRIMARY KEY(ID)
		)"
	);
	$db_connection->query(
		"CREATE TABLE BN_CMS_Admin(
			ID INT AUTO_INCREMENT,
			FullName VARCHAR(255) NOT NULL,
			Email VARCHAR(255) NOT NULL,
			About TEXT NOT NULL,
			PRIMARY KEY(ID)
		)"
	);

	$query = $db_connection->prepare(
		"INSERT INTO 
			BN_CMS_Admin(FullName, Email, About)
		VALUES
			(:fullName, :email, :about)"
	);
	$query->bindParam(':fullName', $a = 'FullName');
	$query->bindParam(':email', $b = 'Email');
	$query->bindParam(':about', $c = 'About');
	$query->execute();

	$db_connection->query(
		"CREATE TABLE BN_CMS_ExternalPages(
			ID INT AUTO_INCREMENT,
			Name VARCHAR(255),
			Link VARCHAR(255),
			PRIMARY KEY(ID)
		)"
	);
	// Done!

?><!DOCTYPE HTML>
<html>
	<head>
		<title>Install Blank Noise CMS</title>
	</head>
	<body>
		<h1>Installation complete</h1>
	</body>
</html>
