<?php
	include_once("config.php");
	include_once("check_auth.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/select2_override.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/adaptive.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


</head>
<body>
	<?php include("db.php") ?>
	<header>
		<div class="header-logo">
			РАСПИСАНИЕ
		</div>
		<?php include("components/header.html") ?>
	</header>
	<div class="error_window">Ошибка в заполнении формы<br>(Проверте выбранали ли группа и дата, приавльно ли заполнена форма)</div>
	<div class="save_window">Расписание сохранено</div>
	<main>
		<nav class="menu">
			
			<?php include("components/nav.html") ?>
		</nav>
		<div class="canvas">
			<div class="canvas-up_menu">
				<div class="canvas-up_menu-date">
					<input type="date" id="date">
					<script type="text/javascript">
						document.getElementById('date').valueAsDate = new Date();
					</script> 
				</div>
				<div class="canvas-up_menu-group">
					<select id="group"><option value="0" selected disabled>Выберите группу</option>
						<?php 
							$result = mysqli_query($db, "SELECT * FROM группы ORDER BY группа ASC");
							while ($row = mysqli_fetch_array($result)){
								echo "<option value=".$row["id_группы"] .">".$row["группа"]."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="canvas-table">
				<div class="table_list" id="table_list-names">
					<div>№</div>
					<div class="s_group">IIпдг.</div>
					<div class="lesson_box">Дисциплина</div>
					<div class="teacher_box">Преподаватель</div >
					<div class="cabinet_box">Аудитория</div >
				</div>
				<?php 

					for ($i=1; $i <= 6; $i++) { 
						echo 	"<div id='table_list-".$i."-1' class='table_list'>
									<div>".$i."</div>
									<div class='s_group'><input class='chk_box' type='checkbox' id='chk_table_list-".$i."-2' disabled=true></div>
										<div><select id='lesson-".$i."' class='lesson'  disabled=true><option value='0'>-----------</option>";
											$result = mysqli_query($db, "SELECT * FROM дисциплины ORDER BY название ASC");
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
											}
										echo "</select></div>";
										echo "<div><select id='teacher-".$i."' class='teacher' disabled=true><option value='0'>-----------</option>";
											$result = mysqli_query($db, "SELECT * FROM преподаватели ORDER BY фамилия ASC");
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
											}
										echo "</select></div>";
										echo "<div><select id='cabinet-".$i."' class='cabinet' disabled=true><option value='0'>-----------</option>";
											$result = mysqli_query($db, "SELECT * FROM аудитории ORDER BY номер ASC");
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
											}
										echo "</select></div>";
									echo "</div>";
						echo 	"<div class='under_table table_list' id='table_list-".$i."-2'>
									<div></div>
									<div></div>
										<div><select id='lesson-".$i."-2' class='lesson'  disabled=true><option value='0'>-----------</option>";
											$result = mysqli_query($db, "SELECT * FROM дисциплины ORDER BY название ASC");
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
											}
										echo "</select></div>";
										echo "<div><select id='teacher-".$i."-2' class='teacher' disabled=true><option value='0'>-----------</option>";
											$result = mysqli_query($db, "SELECT * FROM преподаватели ORDER BY фамилия ASC");
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
											}
										echo "</select></div>";
										echo "<div><select id='cabinet-".$i."-2' class='cabinet' disabled=true><option value='0'>-----------</option>";
											$result = mysqli_query($db, "SELECT * FROM аудитории ORDER BY номер ASC");
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
											}
										echo "</select></div>";
								echo "</div>";
					}


				?>
			<div class="canvas-under_menu">
				<button class="canvas-under_menu-button save" disabled="true">Сохранить</button>
				
			</div>
		</div>
	</main>


	<script type="text/javascript" src="js/dist/bundle.js"></script>
</body>
</html>