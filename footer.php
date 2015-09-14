<?php

	include 'settings.php';

	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	$admin = $db_connection->prepare(
		"SELECT * FROM BN_CMS_Admin WHERE ID = 1"
	);
	$admin->execute();
	$adminObj = $admin->fetch();

?>
<footer> 
	<div>
		<ul>
			<li class="desktop">&copy; <?php echo date("Y"); ?> <?php echo $adminObj['FullName']; ?></li>
			<li class="desktop"><?php echo $adminObj['Email']; ?></li>
			<!-- onclick="openDiv('#contactPopUp')" -->

			<?php include 'externalPages.php'; ?>

			<br>
			<li class="mobile"><?php echo $adminObj['Email']; ?></li>
			<br>
			<li class="mobile">&copy; <?php echo date("Y"); ?> <?php echo $adminObj['FullName']; ?></li>
		</ul>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/script.js"></script>
</footer>