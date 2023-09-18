<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/adaptive.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link rel="icon" href="logo.png">
	<?php 
	include_once ("admin/db.php");
	$dayWeek = [
		"Понедельник",
		"Вторник",
		"Среда",
		"Четверг",
		"Пятница",
		"Суббота",
		"Воскресенье"
	];

	$group = urldecode($_GET['group']);

	$query = sprintf("SELECT группа FROM `группы` WHERE `группы`.`id_группы` = '%s'",
		mysqli_real_escape_string($db,$group));
		$result = mysqli_query($db, $query);

		$row = mysqli_fetch_array($result);
	
		echo "<title>".$row["группа"]."</title>";

	?>
</head>
<body>
	<main>
		<?php 
			$group = urldecode($_GET['group']);

			$query = sprintf("SELECT группа FROM `группы` WHERE `группы`.`id_группы` = '%s'",
				mysqli_real_escape_string($db,$group));
				$result = mysqli_query($db, $query);

				$row = mysqli_fetch_array($result);
				$today = date("Y-m-d");

				$tom = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));// Unix timestapm для завтра

				$aftertom = mktime(0, 0, 0, date("m")  , date("d")+2, date("Y"));// Unix timestapm для после завтра
	
			echo "<h1 class=\"group_name\">".$row['группа']."</h1>";
		?>
		<div class="big_table">
			<h2><?php 
			//делаем -1 в дне недели потомучто массив начинаеться с 0
			echo $dayWeek[date("N") - 1]. " " .date("d.m.Y");
			?></h2>
			<div class="table">
				<div class="table-list _title">
					<div class="table-list-title">№</div>
					<div class="table-list-title">Дисциплина</div>
					<div class="table-list-title">Преподаватель</div>
					<div class="table-list-title">Аудитория</div>
				</div>
				<?php

				

				$group = urldecode($_GET['group']);

				$result = mysqli_query($db, sprintf("SELECT `дисциплины` FROM `расписание` WHERE `дата`='%s' AND `группа`='%s'",
					mysqli_real_escape_string($db,$today),
					mysqli_real_escape_string($db,$group)));
				$row = mysqli_fetch_array($result);
				$lessons = json_decode($row["дисциплины"],true);
				
				if($lessons != null){
					for ($i=1; $i <= 6; $i++) { 
						
						if($lessons[$i] != null){
							
							$result = mysqli_query($db, sprintf("SELECT `название` FROM `дисциплины` WHERE `id_дисциплины`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["lesson"])));
							$row = mysqli_fetch_array($result);
							$lesson = $row["название"];

							// 2 подгруппа урок
							$result = mysqli_query($db, sprintf("SELECT `название` FROM `дисциплины` WHERE `id_дисциплины`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["lesson2"])));
							$row = mysqli_fetch_array($result);
							$lesson2 = $row["название"];

							$result = mysqli_query($db, sprintf("SELECT * FROM `преподаватели` WHERE `id_преподавателя`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["teacher"])));
							$row = mysqli_fetch_array($result);
							$teacher_name = $row["имя"];
							$teacher_surname = $row["фамилия"];
							$teacher_patronymic = $row["отчество"];

							$result = mysqli_query($db, sprintf("SELECT * FROM `преподаватели` WHERE `id_преподавателя`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["teacher2"])));
							$row = mysqli_fetch_array($result);
							$teacher_name2 = $row["имя"];
							$teacher_surname2 = $row["фамилия"];
							$teacher_patronymic2 = $row["отчество"];

							$result = mysqli_query($db, sprintf("SELECT `номер` FROM `аудитории` WHERE `id_аудитории`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["cabinet"])));
							$row = mysqli_fetch_array($result);
							$class = $row["номер"];

							$result = mysqli_query($db, sprintf("SELECT `номер` FROM `аудитории` WHERE `id_аудитории`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["cabinet2"])));
							$row = mysqli_fetch_array($result);
							$class2 = $row["номер"];

							   echo "<div class=\"table-list\">";
									echo "<div class=\"table-list-num\">".$i."</div>";
									echo "<div class=\"table-list-lesson\">".$lesson."</div>";
									echo "<div class=\"table-list-teacher\">".$teacher_surname." ".$teacher_name." ".$teacher_patronymic."</div>";
									echo "<div class=\"table-list-class\">".$class."</div>";
								echo "</div>";

							// Если есть есть отдельное расписание для 2 подгруппы
							if(($lessons[$i]["lesson2"] != null && $lessons[$i]["lesson2"] != 0) && ($lessons[$i]["teacher2"] != null && $lessons[$i]["teacher"] != 0) && ($lessons[$i]["cabinet2"] != null && $lessons[$i]["cabinet2"] != 0)) {

								echo "<div class=\"table-list\">";
									echo "<div class=\"table-list-num\">"." "."</div>";
									echo "<div class=\"table-list-lesson\">".$lesson2."</div>";
									echo "<div class=\"table-list-teacher\">".$teacher_surname2." ".$teacher_name2." ".$teacher_patronymic2."</div>";
									echo "<div class=\"table-list-class\">".$class2."</div>";
								echo "</div>";
							}

						} 
					}
				} else {
					echo "<div class=\"not_found\">Пары отсутсвуют</div>";
				}
				
				
				
				
				?>
			</div>
		</div>

<!-- Завтрашний день -->
		<div class="big_table">
			<h2><?php 
			//делаем -1 в дне недели потомучто массив начинаеться с 0
			echo $dayWeek[date("N",$tom) - 1] ." ". date("d.m.Y",$tom);
			?></h2>
			<div class="table">
				<div class="table-list _title">
					<div class="table-list-title">№</div>
					<div class="table-list-title">Дисциплина</div>
					<div class="table-list-title">Преподаватель</div>
					<div class="table-list-title">Аудитория</div>
				</div>
				<?php

				

				$group = urldecode($_GET['group']);

				$result = mysqli_query($db, sprintf("SELECT `дисциплины` FROM `расписание` WHERE `дата`='%s' AND `группа`='%s'",
					mysqli_real_escape_string($db,date("Y-m-d",$tom)),
					mysqli_real_escape_string($db,$group)));
				$row = mysqli_fetch_array($result);
				$lessons = json_decode($row["дисциплины"],true);

				if($lessons != null){
					for ($i=1; $i <= 6; $i++) { 
						
						if($lessons[$i] != null){
							
							$result = mysqli_query($db, sprintf("SELECT `название` FROM `дисциплины` WHERE `id_дисциплины`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["lesson"])));
							$row = mysqli_fetch_array($result);
							$lesson = $row["название"];

							// 2 подгруппа урок
							$result = mysqli_query($db, sprintf("SELECT `название` FROM `дисциплины` WHERE `id_дисциплины`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["lesson2"])));
							$row = mysqli_fetch_array($result);
							$lesson2 = $row["название"];

							$result = mysqli_query($db, sprintf("SELECT * FROM `преподаватели` WHERE `id_преподавателя`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["teacher"])));
							$row = mysqli_fetch_array($result);
							$teacher_name = $row["имя"];
							$teacher_surname = $row["фамилия"];
							$teacher_patronymic = $row["отчество"];

							$result = mysqli_query($db, sprintf("SELECT * FROM `преподаватели` WHERE `id_преподавателя`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["teacher2"])));
							$row = mysqli_fetch_array($result);
							$teacher_name2 = $row["имя"];
							$teacher_surname2 = $row["фамилия"];
							$teacher_patronymic2 = $row["отчество"];

							$result = mysqli_query($db, sprintf("SELECT `номер` FROM `аудитории` WHERE `id_аудитории`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["cabinet"])));
							$row = mysqli_fetch_array($result);
							$class = $row["номер"];

							$result = mysqli_query($db, sprintf("SELECT `номер` FROM `аудитории` WHERE `id_аудитории`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["cabinet2"])));
							$row = mysqli_fetch_array($result);
							$class2 = $row["номер"];

							  	echo "<div class=\"table-list\">";
									echo "<div class=\"table-list-num\">".$i."</div>";
									echo "<div class=\"table-list-lesson\">".$lesson."</div>";
									echo "<div class=\"table-list-teacher\">".$teacher_surname." ".$teacher_name." ".$teacher_patronymic."</div>";
									echo "<div class=\"table-list-class\">".$class."</div>";
								echo "</div>";

							if(($lessons[$i]["lesson2"] != null && $lessons[$i]["lesson2"] != 0) && ($lessons[$i]["teacher2"] != null && $lessons[$i]["teacher"] != 0) && ($lessons[$i]["cabinet2"] != null && $lessons[$i]["cabinet2"] != 0)) {

								echo "<div class=\"table-list\">";
									echo "<div class=\"table-list-num\">"." "."</div>";
									echo "<div class=\"table-list-lesson\">".$lesson2."</div>";
									echo "<div class=\"table-list-teacher\">".$teacher_surname2." ".$teacher_name2." ".$teacher_patronymic2."</div>";
									echo "<div class=\"table-list-class\">".$class2."</div>";
								echo "</div>";
							}
						}
					}
				}  else {
					echo "<div class=\"not_found\">Пары отсутсвуют</div>";
				}
				?>
			</div>
		</div>
<!-- После завтра -->
		<div class="big_table">
			<h2><?php 
			//делаем -1 в дне недели потомучто массив начинаеться с 0
			echo $dayWeek[date("N",$aftertom) - 1] ." ". date("d.m.Y",$aftertom);
			?></h2>
			<div class="table">
				<div class="table-list _title">
					<div class="table-list-title">№</div>
					<div class="table-list-title">Дисциплина</div>
					<div class="table-list-title">Преподаватель</div>
					<div class="table-list-title">Аудитория</div>
				</div>
				
				<?php

				

				$group = urldecode($_GET['group']);

				$result = mysqli_query($db, sprintf("SELECT `дисциплины` FROM `расписание` WHERE `дата`='%s' AND `группа`='%s'",
					mysqli_real_escape_string($db,date("Y-m-d",$aftertom)),
					mysqli_real_escape_string($db,$group)));
				$row = mysqli_fetch_array($result);
				$lessons = json_decode($row["дисциплины"],true);
				
				if($lessons != null){
					for ($i=1; $i <= 6; $i++) { 
						
						if($lessons[$i] != null){
							
							$result = mysqli_query($db, sprintf("SELECT `название` FROM `дисциплины` WHERE `id_дисциплины`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["lesson"])));
							$row = mysqli_fetch_array($result);
							$lesson = $row["название"];

							// 2 подгруппа урок
							$result = mysqli_query($db, sprintf("SELECT `название` FROM `дисциплины` WHERE `id_дисциплины`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["lesson2"])));
							$row = mysqli_fetch_array($result);
							$lesson2 = $row["название"];

							$result = mysqli_query($db, sprintf("SELECT * FROM `преподаватели` WHERE `id_преподавателя`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["teacher"])));
							$row = mysqli_fetch_array($result);
							$teacher_name = $row["имя"];
							$teacher_surname = $row["фамилия"];
							$teacher_patronymic = $row["отчество"];

							$result = mysqli_query($db, sprintf("SELECT * FROM `преподаватели` WHERE `id_преподавателя`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["teacher2"])));
							$row = mysqli_fetch_array($result);
							$teacher_name2 = $row["имя"];
							$teacher_surname2 = $row["фамилия"];
							$teacher_patronymic2 = $row["отчество"];

							$result = mysqli_query($db, sprintf("SELECT `номер` FROM `аудитории` WHERE `id_аудитории`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["cabinet"])));
							$row = mysqli_fetch_array($result);
							$class = $row["номер"];

							$result = mysqli_query($db, sprintf("SELECT `номер` FROM `аудитории` WHERE `id_аудитории`='%s'",
								mysqli_real_escape_string($db,$lessons[$i]["cabinet2"])));
							$row = mysqli_fetch_array($result);
							$class2 = $row["номер"];

							   echo "<div class=\"table-list\">";
									echo "<div class=\"table-list-num\">".$i."</div>";
									echo "<div class=\"table-list-lesson\">".$lesson."</div>";
									echo "<div class=\"table-list-teacher\">".$teacher_surname." ".$teacher_name." ".$teacher_patronymic."</div>";
									echo "<div class=\"table-list-class\">".$class."</div>";
								echo "</div>";

							if(($lessons[$i]["lesson2"] != null && $lessons[$i]["lesson2"] != 0) && ($lessons[$i]["teacher2"] != null && $lessons[$i]["teacher"] != 0) && ($lessons[$i]["cabinet2"] != null && $lessons[$i]["cabinet2"] != 0)) {

								echo "<div class=\"table-list\">";
									echo "<div class=\"table-list-num\">"." "."</div>";
									echo "<div class=\"table-list-lesson\">".$lesson2."</div>";
									echo "<div class=\"table-list-teacher\">".$teacher_surname2." ".$teacher_name2." ".$teacher_patronymic2."</div>";
									echo "<div class=\"table-list-class\">".$class2."</div>";
								echo "</div>";
							}
						} 

					}
				}else {
					echo "<div class=\"not_found\">Пары отсутсвуют</div>";
				}
				?>
			</div>
		</div>
	</main>
</body>
</html>