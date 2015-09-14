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
	 	"SELECT * FROM BN_CMS_Admin WHERE ID = 1"
	);
	$result->execute();
	$item = $result->fetch();

 ?><!DOCTYPE HTML>
<html>
	<head>
		<title>Taloo Content Management</title>
	</head>
	<body>
		<h1>Edit Admin</h1>
		<form method="post" action="editAdmin-action.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $item['ID']; ?>" />
			<div class="form-item">
				<label for="fullName">Name</label>
				<input id="fullName" name="fullName" type="text" value="<?php echo $item['FullName']; ?>" />
			</div>
			<div class="form-item">
				<label for="email">Email</label>
				<input id="email" name="email"type="text" value="<?php echo $item['Email']; ?>" />
			</div>
			<div class="form-item">
				<label for="about">About</label>
				<textarea id="about" name="about"><?php echo $item['About']; ?></textarea>
			</div>
			<div class="form-item">
				<button type="submit">Save admin info</button>
			</div>
		</form>
	</body>
</html>

 