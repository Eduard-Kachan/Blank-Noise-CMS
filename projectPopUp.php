<?php

	include 'settings.php';

	$db_connection = new PDO("mysql:dbname=$db_name;host=$db_server", $db_username, $db_password);

	$result = $db_connection->query(
		"SELECT * FROM BN_CMS_Content WHERE Archived = 0"
	);

?>
<section id="projectsPopUp" class="pop-up">
	<div class="returnBtn " onclick="hideDiv()"></div>
	<ul class="vertical-allign">
		<?php while ( $item = $result->fetch() ): ?>			
			<li>
				<a href="caseStudy.php?id=<?php echo $item['ID']; ?>">
					<?php echo $item['Title']; ?>
				</a>
			</li>
		<?php endwhile; ?>
	</ul>
</section>