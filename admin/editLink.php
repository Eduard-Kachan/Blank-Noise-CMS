<?php 

	include 'admin.php';

	// Include settings
	include '../settings.php';

	// Open connection to database
	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	// Get content
	// $result = $db_connection->query(
	// 	"SELECT * FROM Content WHERE ID = $_GET['id']"
	// );

	$result = $db_connection->prepare(
	 	"SELECT * FROM BN_CMS_ExternalPages WHERE ID = :id"
	);
	$result->bindParam(':id', $_GET['id']);
	$result->execute();
	$item = $result->fetch();

 ?><!DOCTYPE HTML>
<html>
	<head>
		<title>Taloo Content Management</title>
	</head>
	<body>
		<h1>Edit Link</h1>
		<form method="post" action="editLink-action.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $item['ID']; ?>" />
			<div class="form-item">
				<label for="name">Name</label>
				<input id="name" name="name" type="text" value="<?php echo $item['Name']; ?>" />
			</div>
			<div class="form-item">
				<label for="link">Link URL</label>
				<input id="link" name="link"type="text" value="<?php echo $item['Link']; ?>" />
			</div>
			<div class="form-item">
				<button type="submit">Edit Link</button>
			</div>
		</form>
	</body>
</html>

 