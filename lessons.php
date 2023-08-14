<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/selcet2_override.css">
	<link rel="stylesheet" type="text/css" href="styles/crud.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


</head>
<body>
	<?php include("db.php") ?>
	<header>
		<div class="header-logo">
			ДИСЦИПЛИНЫ
		</div>
		<div class="header-text">
			Something...
		</div>
	</header>
	<main>

		<div class="menu">
			<a href="/" class="menu-navbutton">Расписание</a>
			<a href="lessons.php" class="menu-navbutton">Дисциплины</a>
			<a href="/teachers.php" class="menu-navbutton">Преподаватели</a>
		</div>
		<div class="canvas">
			<div class="pop_up">
				<div class="pop_up-dialog">
					<label class="pop_up-dialog-text"></label>
					<button>Удалить</button>
					<button>Отмена</button>
				</div>
			</div>
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
					<button id="add_lesson" class="canvas-block-form-button">Сахранить</button>
				</div>
			</div>
		</div>
		<div class="right_menu">
		</div>
	</main>


	<script type="text/javascript" src="JS/dist/bundle.js"></script>
</body>
</html>