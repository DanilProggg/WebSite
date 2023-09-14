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
					<h2>Дисциплины</h2>
					<table class="canvas-block-units-table">
						<?php 
							$result = mysqli_query($db, "SELECT * FROM дисциплины");
							while ($row = mysqli_fetch_array($result)){
								echo "<tr id='lesson-".$row['id_дисциплины']."'><td>" ."<div class='canvas-block-units-unit'>".$row['название']."</div>". "</td><td><img id='".$row['id_дисциплины']."' alt='Удалить' class='canvas-block-units-img del_lesson' src='img/del.png'></td></tr>";
							}
						?>
					</table>
				</div>
				<div class="canvas-block-form">
					<h2>Добавить дисциплину</h2>
					<input class="canvas-block-form-input" placeholder="Назавние дисциплины">
					<button id="add_lesson" class="canvas-block-form-button">Сохранить</button>
				</div>
			</div>
		</div>
	</main>


	<script type="text/javascript" src="js/dist/bundle.js"></script>
</body>
</html>