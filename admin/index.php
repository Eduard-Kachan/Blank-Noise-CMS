

<?php 
	include 'admin.php';

	// Include settings
	include '../settings.php';

	// Open connection to database
	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	// Get content
	$result = $db_connection->query(
		"SELECT * FROM BN_CMS_Content"
	);
	$links = $db_connection->query(
		"SELECT * FROM BN_CMS_ExternalPages"
	);

	$admin = $db_connection->prepare(
		"SELECT * FROM BN_CMS_Admin WHERE ID = 1"
	);
	$admin->execute();
	$adminObj = $admin->fetch();
  ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Taloo Content Management</title>
	</head>
	<body>
		<nav> 
			<ul>
				<li>
					<a href="editAdmin.php">
						<button>Edit Admin Info</button>
					</a>
					<ul>
						<li>
							<p>Name: <?php echo $adminObj['FullName']; ?></p>
						</li>
						<li>
							<p>Email: <?php echo $adminObj['Email']; ?></p>
						</li>
						<li>
							<p>About: <?php echo $adminObj['About']; ?></p>
						</li>
					</ul>
				</li>
				<li>
					<a href="add.php">
						<button>Add new content</button>
					</a>
					<ul><?php while ( $item = $result->fetch() ): ?>
						<li>
							<a href="edit.php?id=<?php echo $item['ID']; ?>"> Edit: <?php echo $item['Title']; ?></a>
						</li>
					<?php endwhile; ?></ul>
				</li>
				<li>
					<a href="addLink.php">
						<button>Add new Nav Link</button>
					</a>
					<ul><?php while ( $item = $links->fetch() ): ?>
						<li>
							<a href="editLink.php?id=<?php echo $item['ID']; ?>"><?php echo $item['Name']; ?></a>
						</li>
					<?php endwhile; ?></ul>
				</li>
			</ul>
		</nav>
		<ul>
			
		</ul>
	</body>
</html>