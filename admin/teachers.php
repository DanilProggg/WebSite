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
	<title>Преподаватели</title>

</head>
<body>
	<?php include("db.php") ?>
	<header>
		<div class="header-logo">
			ПРЕПОДАВАТЕЛИ
		</div>
		<?php include("components/header.html")?>
	</header>
	<main>

		<nav class="menu">
			<?php include("components/nav.html")?>
		</nav>
		<div class="canvas">
			<div class="canvas-block">
				<div class="canvas-block-units">
					<h2>Преподаватели</h2>
					<table class="canvas-block-units-table">
						<?php 
							$result = mysqli_query($db, "SELECT * FROM преподаватели");
							while ($row = mysqli_fetch_array($result)){
								echo "<tr id='teacher-".$row['id_преподавателя']."'><td>" ."<div class='canvas-block-units-unit'>".$row['фамилия']." ".$row['имя']." ".$row['отчество']."</div>". "</td><td><img id='".$row['id_преподавателя']."' alt='Удалить' class='canvas-block-units-img del_teacher' src='img/del.png'></td></tr>";
							}
						?>
					</table>
				</div>
				<div class="canvas-block-form">
					<h2>Добавить преподавателя</h2>
					<input class="canvas-block-form-input surname" placeholder="Фамилия">
					<input class="canvas-block-form-input name" placeholder="Имя">
					<input class="canvas-block-form-input patronymic" placeholder="Отчество">
					<button id="add_teacher" class="canvas-block-form-button">Сохранить</button>
				</div>
			</div>
		</div>
	</main>


	<script type="text/javascript" src="js/dist/bundle.js"></script>
</body>
</html>