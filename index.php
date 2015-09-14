/**
 * The Home page template file
 *
 * A CMS for Eduard Kachan. If the databace is not set up 
 * install.php is requared to be lunched first.
 *
 * Developed by Eduard Kachan: {@link http://eduard-kachan.github.io}
 *
 */

<?php

	include 'settings.php';

	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	$admin = $db_connection->prepare(
		"SELECT * FROM BN_CMS_Admin WHERE ID = 1"
	);
	$admin->execute();
	$adminObj = $admin->fetch();

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edvaard - Code Enthusiast</title>
	<link rel="stylesheet" type="text/css" href="css/global-style.css">
	<link rel="stylesheet" type="text/css" href="css/home-style.css">
	<link href='http://fonts.googleapis.com/css?family=Signika:700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrapper">
		<section class="fake-margin"></section>
		<section class="home-body">
			<div class="content-half"> 
				<div class="vertical-allign-mobile">
					<header>
						<h1 class="hidden">Edvaard - Code Enthusiast</h1>
						<img src="images/logo-white.svg" alt="Edvaard" class="logo">
						<h2>Code Enthusiast</h2>
					</header>
					<p>
						<?php echo $adminObj['About']; ?>
					</p>
				</div>
			</div>
			<div class="nav-fix">
				<button class="case-studiesBtn vertical-allign-mobile" onclick="openDiv('#projectsPopUp')">Case Studies</button>
			</div>
			<?php include 'footer.php'; ?>
		</section>
	</div>
	<?php include 'projectPopUp.php'; ?>
	<?php include 'contactPopUp.php'; ?>
</body>
</html>
