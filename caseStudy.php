<?php

	// Include settings
	include 'settings.php';

	// Open connection to database
	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	// Get content
	$query = $db_connection->prepare(
		"SELECT * FROM BN_CMS_Content WHERE id=:id"
	);
	$query->bindParam(':id', $_GET['id']);
	$query->execute();
	$content = $query->fetch();

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edvaard</title>
	<link rel="stylesheet" type="text/css" href="css/global-style.css">
	<!-- link rel="stylesheet" type="text/css" href="../CSS/home-style.css"> -->
	<link href='http://fonts.googleapis.com/css?family=Signika:700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrapper">
		<header id="header">
			<h1 class="hidden">Edvaard - Code Enthusiast</h1>
			<a href="index.php" class="logo"><img src="images/logo-black.svg" alt="Edvaard" ></a>
			<nav>
				<ul>
					<li><button class="case-studiesBtn" onclick="openDiv('#projectsPopUp')">Case Studies</button></li>
					<?php include 'externalPages.php'; ?>
				</ul>
			</nav>
		</header> 
		<section class="body">
			<?php echo $content['Body']; ?>
		<?php include 'footer.php'; ?>
	</div>
	<?php include 'projectPopUp.php'; ?>
	<?php include 'contactPopUp.php'; ?>
</body>
</html>