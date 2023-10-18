<?php 
	include_once("check_auth.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/select2_override.css">
	<link rel="stylesheet" type="text/css" href="styles/crud.css">
	<link rel="stylesheet" type="text/css" href="styles/stats.css">
	<link rel="stylesheet" type="text/css" href="styles/adaptive.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	<title>Дисциплины</title>

</head>
<body>
	<?php include("db.php") ?>
	<header>
		<div class="header-logo">
			СТАТИСТИКА
		</div>
		<?php include("components/header.html") ?>
	</header>
	<main>

		<nav class="menu">
			<?php include("components/nav.html")?>
		</nav>
		<div class="canvas">

			<select class="group" id="stats-group"><option value="0" selected disabled>Выберите группу</option>
				<?php 
					$result = mysqli_query($db, "SELECT * FROM группы ORDER BY группа ASC");
						while ($row = mysqli_fetch_array($result)){
							echo "<option value=".$row["id_группы"] .">".$row["группа"]."</option>";
						}
				?>
			</select>
			<div class="canvas-stats_group_list">
				<div class="canvas-stats_group_list-title">
					<div>Дисциплина</div>
					<div>Запланировано, часы</div>
					<div>Пройдено, часы</div>
					<div>Пройдено, %</div>
				</div>	
			</div>
		</div>
	</main>


	<script type="text/javascript" src="js/dist/bundle.js"></script>
</body>
</html>