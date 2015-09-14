<?php

	// Check that admin user is logged in
	include 'admin.php';

?><!DOCTYPE HTML>
<html>
	<head>
		<title>Taloo Content Management</title>
	</head>
	<body>
		<h1>Add New Link</h1> 
		<form method="post" action="addLink-action.php" enctype="multipart/form-data">
			<div class="form-item">
				<label for="name">Name</label>
				<input id="name" name="name" type="text" />
			</div>
			<div class="form-item">
				<label for="link">Link URL</label>
				<input id="link" name="link"></input>
			</div>
			<div class="form-item">
				<button type="submit">Add Link</button>
			</div>
		</form>
	</body>
</html>