<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
	<main>
		<div class="menu">
			<a class="menu-navbutton">Расписание</a>
			<a class="menu-navbutton">Расписание</a>
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
					<select id="group">
						<?php 
							$result = mysqli_query($db, "SELECT * FROM группы");
							while ($row = mysqli_fetch_array($result)){
								echo "<option value=".$row["id_группы"] .">".$row["группа"]."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="canvas-table">
				<table id="table_list">
					<tr id="table_list-names"><td>№</td><td>Дисциплина</td><td>Преподаватель</td><td>Аудитория</td></tr>

					<tr id="table_list-1"><td>1</td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-2"><td>2</td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-3"><td>3</td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-4"><td>4</td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-5"><td>5</td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
					<tr id="table_list-6"><td>6</td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM дисциплины");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_дисциплины"] .">".$row["название"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM преподаватели");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_преподавателя"] .">".$row["фамилия"] ." ". $row["имя"]." ".$row["отчество"]."</option>";
								}
							?>
						</select></td>
						<td><select>
							<?php 
								$result = mysqli_query($db, "SELECT * FROM аудитории");
								while ($row = mysqli_fetch_array($result)){
									echo "<option value=".$row["id_аудитории"] .">".$row["номер"]."</option>";
								}
							?>
						</select></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="right_menu">
		</div>
	</main>


	<script type="text/javascript" src="JS/dist/bundle.js"></script>
</body>
</html>