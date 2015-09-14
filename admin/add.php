<?php

	// Check that admin user is logged in
	include 'admin.php';

?><!DOCTYPE HTML>
<html>
	<head>
		<title>Taloo Content Management</title>
	</head>
	<body>
		<h1>Add New Content</h1>
		<form method="post" action="add-action.php" enctype="multipart/form-data">
			<div class="form-item">
				<label for="title">Title</label>
				<input id="title" name="title" type="text" />
			</div>
			<div class="form-item">
				<label for="body">Body</label>
				<textarea id="body" name="body"></textarea>
			</div>
			<div class="form-item">
				<input id="archived" type="checkbox" name="archived" value="yes">
				<label for="archived">Archived</label>
			</div>
			<div class="form-item">
				<button type="submit">Add Content</button>
			</div>
		</form>
	</body>
</html>