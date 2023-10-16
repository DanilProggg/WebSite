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
			<div class="canvas-nav_stats">
				<a href="stats.php" class="canvas-nav_stats-unit canvas-nav_stats-unit-s">Статистика</a><a href="statsadd.php" class="canvas-nav_stats-unit">Добавить дисциплину</a>
			</div>
			<h2>Группа</h2>
			<select class="group" id="stats-group">
				<?php 
					$result = mysqli_query($db, "SELECT * FROM группы ORDER BY группа ASC");
						while ($row = mysqli_fetch_array($result)){
							echo "<option value=".$row["id_группы"] .">".$row["группа"]."</option>";
						}
				?>
			</select>
			<div class="canvas-stats_group_list">
				
			</div>
		</div>
	</main>


	<script type="text/javascript" src="js/dist/bundle.js"></script>
</body>
</html>