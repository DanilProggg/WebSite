<?php 
	include_once("check_auth.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/select2_override.css">
	<link rel="stylesheet" type="text/css" href="styles/crud.css">
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
			РАСПИСАНИЕ
		</div>
		<?php include("components/header.html") ?>
	</header>
	<main>

		<nav class="menu">
			<?php include("components/nav.html")?>
		</nav>
		<div class="canvas">
			<div class="canvas-block">
				<div class="canvas-block-units">
					<div class="canvas-block-units-lessons_title">
						<h2>Часы</h2>
						<h2>Дисциплины</h2>
					</div>
					
					<table class="canvas-block-units-table">
						<?php 
							$result = mysqli_query($db, "SELECT * FROM дисциплины ORDER BY название ASC");
							while ($row = mysqli_fetch_array($result)){
								echo "<div class='canvas-block-units-lesson_grid' id='".$row['id_дисциплины']."'>" .
										"<input class='canvas-block-units-hours' value='".$row['часы']."'>".
										"<div class='canvas-block-units-unit'>".$row['название']."</div>". 
										"<img alt='Удалить' class='canvas-block-units-img del_lesson' src='img/del.png'>
									</div>";
							}
						?>
					</table>
				</div>
				<div class="canvas-block-form">
					<h2>Добавить дисциплину</h2>
					<input class="canvas-block-form-input name" placeholder="Назавние дисциплины">
					<input class="canvas-block-form-input hours" placeholder="Количество часов">
					<button id="add_lesson" class="canvas-block-form-button">Сохранить</button>
				</div>
			</div>
		</div>
	</main>


	<script type="text/javascript" src="js/dist/bundle.js"></script>
</body>
</html>