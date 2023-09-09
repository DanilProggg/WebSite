<?php 
	include_once("check_auth.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/select2_override.css">
	<link rel="stylesheet" type="text/css" href="styles/crud.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	<title>Аудитории</title>

</head>
<body>
	<?php include("db.php") ?>
	<header>
		<div class="header-logo">
			АУДИТОРИИ
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
					<h2>Аудитория</h2>
					<table class="canvas-block-units-table">
						<?php 
							$result = mysqli_query($db, "SELECT * FROM аудитории");
							while ($row = mysqli_fetch_array($result)){
								echo "<tr id='cabinet-".$row['id_аудитории']."'><td>" ."<div class='canvas-block-units-unit'>".$row['номер']."</div>". "</td><td><img id='".$row['id_аудитории']."' alt='Удалить' class='canvas-block-units-img del_cabinet' src='img/del.png'></td></tr>";
							}
						?>
					</table>
				</div>
				<div class="canvas-block-form">
					<h2>Добавить аудиторию</h2>
					<input class="canvas-block-form-input number" placeholder="Номер аудитории">
					<button id="add_cabinet" class="canvas-block-form-button ">Сохранить</button>
				</div>
			</div>
		</div>
		<div class="right_menu">
		</div>
	</main>


	<script type="text/javascript" src="js/dist/bundle.js"></script>
</body>
</html>