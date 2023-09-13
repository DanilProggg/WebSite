<!DOCTYPE html>
<html>
<head>
	<?php
	include_once("admin/db.php");
	?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/adaptive.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	<title>Расписание</title>
</head>
<body>
	<main>
		<h1 class="header_title">Расписание</h1>
		<div class="group_table">
			<?php 
				$result = mysqli_query($db, "SELECT * FROM группы ORDER BY группа ASC");
				while ($row = mysqli_fetch_array($result)){
					echo "<a href=view.php?group=".$row['id_группы']."><div class='group_table-unit'>" . $row["группа"] . "</div></a>";
				}
			?>
		</div>
	</main>
</body>
</html>