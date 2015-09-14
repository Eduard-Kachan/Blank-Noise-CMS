<?php

	include 'settings.php';

	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	$links = $db_connection->query(
		"SELECT * FROM BN_CMS_ExternalPages"
	);

?>
<?php while ( $item = $links->fetch() ): ?>
	<li>
		<a href="<?php echo $item['Link']; ?>"><?php echo $item['Name']; ?></a>
	</li>
<?php endwhile; ?>