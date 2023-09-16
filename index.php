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
	<h1 class="header_title">Расписание</h1>
	<main class="main_page">
		<div class="timetable main_unit">
			<div class="timetable-row timetable-row-title">
				<div class="timetable-row-unit"></div>
				<div class="timetable-row-unit">будни</div>
				<div class="timetable-row-unit">суббота</div>
			</div>
			<div class="timetable-row">
				<div class="timetable-row-unit">1 пара</div>
				<div class="timetable-row-unit">9:00 - 10:30</div>
				<div class="timetable-row-unit">9:00 - 10:30</div>
			</div>
			<div class="timetable-row">
				<div class="timetable-row-unit">2 пара</div>
				<div class="timetable-row-unit">10:40 - 12:10</div>
				<div class="timetable-row-unit">10:40 - 12:10</div>
			</div>
			<div class="timetable-row">
				<div class="timetable-row-unit">3 пара</div>
				<div class="timetable-row-unit">12:40 - 14:10</div>
				<div class="timetable-row-unit">12:20 - 13:50</div>
			</div>
			<div class="timetable-row">
				<div class="timetable-row-unit">4 пара</div>
				<div class="timetable-row-unit">14:30 - 16:00</div>
				<div class="timetable-row-unit">14:00 - 15:30</div>
			</div>
			<div class="timetable-row">
				<div class="timetable-row-unit">5 пара</div>
				<div class="timetable-row-unit">16:10 - 17:40</div>
				<div class="timetable-row-unit">15:40 - 17:10</div>
			</div>
			<div class="timetable-row">
				<div class="timetable-row-unit">3 пара</div>
				<div class="timetable-row-unit">17:50 - 19:20</div>
				<div class="timetable-row-unit"></div>
			</div>
		</div>
		<div class="main_unit group_list">
			<div class="group_table">
				<?php 
					$result = mysqli_query($db, "SELECT * FROM группы ORDER BY группа ASC");
					while ($row = mysqli_fetch_array($result)){
						echo "<a href=view.php?group=".$row['id_группы']."><div class='group_table-unit'>" . $row["группа"] . "</div></a>";
					}
				?>
			</div>
		</div>
	</main>
</body>
</html>