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
	 	"SELECT * FROM BN_CMS_Content WHERE ID = :id"
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
		<h1>Edit Content</h1>
		<form method="post" action="edit-action.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $item['ID']; ?>" />
			<div class="form-item">
				<label for="title">Title</label>
				<input id="title" name="title" type="text" value="<?php echo $item['Title']; ?>" />
			</div>
			<div class="form-item">
				<label for="body">Body</label>
				<textarea id="body" name="body"><?php echo $item['Body']; ?></textarea>
			</div>
			<div class="form-item">
				<input id="archived" type="checkbox" name="archived" value="yes">
				<label for="archived">Archived</label>
			</div>
			<div class="form-item">
				<button type="submit">Edit Content</button>
			</div>
		</form>
	</body>
</html>

 