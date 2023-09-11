<!DOCTYPE html>
<html>
<head>
	<?php
	include_once("admin/db.php");
	?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<title>Расписание</title>
</head>
<body>
	<main>
		<h1>Расписание</h1>
		<div class="group_table">
			<?php 
				$result = mysqli_query($db, "SELECT * FROM группы ORDER BY группа ASC");
				while ($row = mysqli_fetch_array($result)){
					echo "<div class='group_table-unit'>" . $row["группа"] . "</div>";
				}
			?>
		</div>
	</main>
</body>
</html>