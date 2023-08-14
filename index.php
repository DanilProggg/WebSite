<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/selcet2_override.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
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
		<div class="header-text">
			Something...
		</div>
	</header>
	<div class="error_window">Ошибка в заполнении формы<br>(Проверте выбранали ли группа и дата, приавльно ли заполнена форма)</div>
	<main>

		<div class="menu">
			<a href="/" class="menu-navbutton">Расписание</a>
			<a href="/lessons.php" class="menu-navbutton">Дисциплины</a>
			<a href="/teachers.php" class="menu-navbutton">Преподаватели</a>
			<a href="cabinets.php" class="menu-navbutton">Аудитории</a>
		</div>
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
							$result = mysqli_query($db, "SELECT * FROM группы");
							while ($row = mysqli_fetch_array($result)){
								echo "<option value=".$row["id_группы"] .">".$row["группа"]."</option>";
							}
						?>
					</select>
				</div>
			</div>
				<table class="canvas-table" id="table_list">
					<tr id="table_list-names"><td>№</td><td>Дисциплина</td><td>Преподаватель</td><td>Аудитория</td></tr>

					<tr id="table_list-1"><td>1</td>
						<td><select id="lesson-1" class="lesson"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select id="teacher-1" class="teacher"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select id="cabinet-1" class="cabinet"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-2"><td>2</td>
						<td><select id="lesson-2" class="lesson"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select id="teacher-2" class="teacher"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select id="cabinet-2" class="cabinet"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-3"><td>3</td>
						<td><select id="lesson-3" class="lesson"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select id="teacher-3" class="teacher"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select id="cabinet-3" class="cabinet"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-4"><td>4</td>
						<td><select id="lesson-4" class="lesson"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select id="teacher-4" class="teacher"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select id="cabinet-4" class="cabinet"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-5"><td>5</td>
						<td><select id="lesson-5" class="lesson"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select id="teacher-5" class="teacher"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select id="cabinet-5" class="cabinet"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-6"><td>6</td>
						<td><select id="lesson-6" class="lesson"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select id="teacher-6" class="teacher"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select id="cabinet-6" class="cabinet"><option value="0">-----------</option>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
				</table>
			<div class="canvas-under_menu">
				<button class="canvas-under_menu-button save">Сахранить</button>
				
			</div>
		</div>
		<div class="right_menu">
		</div>
	</main>


	<script type="text/javascript" src="JS/dist/bundle.js"></script>
</body>
</html>