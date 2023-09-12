<?php 
	include_once("check_auth.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/adaptive.css">
	<link rel="stylesheet" type="text/css" href="styles/crud.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/select2_override.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	<title>Группы</title>
</head>
<body>
	<?php include("db.php") ?>
	<header>
		<div class="header-logo">
			ГРУППЫ
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
					<h2>Группы</h2>
					<table class="canvas-block-units-table">
						<?php 
							$result = mysqli_query($db, "SELECT * FROM группы");
							while ($row = mysqli_fetch_array($result)){
								echo "<tr id='group-".$row['id_группы']."'><td>" ."<div class='canvas-block-units-unit'>".$row['группа']."</div>". "</td><td><img id='".$row['id_группы']."' alt='Удалить' class='canvas-block-units-img del_group' src='img/del.png'></td></tr>";
							}
						?>
					</table>
				</div>
				<div class="canvas-block-form">
					<h2>Добавить группу</h2>
					<input class="canvas-block-form-input" placeholder="Назание группы">
					<button id="add_group" class="canvas-block-form-button">Сохранить</button>
				</div>
			</div>
		</div>
	</main>


	<script type="text/javascript" src="js/dist/bundle.js"></script>
</body>
</html>