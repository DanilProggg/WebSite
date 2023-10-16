<?php 
	include_once("check_auth.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/stats.css">
	<link rel="stylesheet" type="text/css" href="styles/crud.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/select2_override.css">
	<link rel="stylesheet" type="text/css" href="styles/adaptive.css">
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
					<div class="canvas-block-units-table">
						<?php 
							$result = mysqli_query($db, "SELECT * FROM группы ORDER BY группа ASC");
							while ($row = mysqli_fetch_array($result)){
								echo "<div class='canvas-block-units-grid' id='group-".$row['id_группы']."'>" .
									 	"<div class='canvas-block-units-unit'>".$row['группа']."</div>". "
									 	<img id='".$row['id_группы']."' alt='Удалить' class='canvas-block-units-img del_group' src='img/del.png'>
									  </div>";
							}
						?>
					</div>
				</div>
				<div class="canvas-block-form">
					<h2>Добавить группу</h2>
					<input class="canvas-block-form-input" placeholder="Назание группы">
					<button id="add_group" class="canvas-block-form-button">Сохранить</button>
				</div>
			</div>

			<!--  Часть с конфигурированием групп-->
			
			<div class="canvas-block canvas-stats_block">
				<select class="group" id="statsadd-group"><option value="0" selected disabled>Выберите группу</option>
						<?php 
							$result = mysqli_query($db, "SELECT * FROM группы ORDER BY группа ASC");
							while ($row = mysqli_fetch_array($result)){
								echo "<option value=".$row["id_группы"] .">".$row["группа"]."</option>";
							}
						?>
				</select>
				<div class="canvas-statsadd">
					<div class="exist-groups">
						<h3>Все дисциплины</h3>
						<?php 
						$result = mysqli_query($db, "SELECT * FROM дисциплины ORDER BY название ASC");
							while ($row = mysqli_fetch_array($result)){
								echo "<div class='exist-groups-unit' id=exist-".$row["id_дисциплины"] .">".
								"<div class='exist-groups-unit-name'>".$row["название"]."</div>".
								"<div class='link_button'>Добавить</div>".

								"</div>";
							}
						?>
					</div>
					<div class="linked-groups">
						<h3>Дициплины группы для изучения</h3>
					</div>
				</div>
			</div>
		</div>
	</main>


	<script type="text/javascript" src="js/dist/bundle.js"></script>
</body>
</html>