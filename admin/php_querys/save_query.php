<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);





$date = $data['date'];
$group =  $data['group'];
$lessons = json_encode($data['lessons'], JSON_UNESCAPED_UNICODE);

$result = mysqli_query($db, sprintf("SELECT `id_расписания` FROM `расписание` WHERE `дата`='%s' AND`id_группы`='%s'",
	mysqli_real_escape_string($db,$date),
	mysqli_real_escape_string($db,$group)));
$row = mysqli_fetch_array($result);
$replace_row = $row['id_расписания'];
//Проверка на наличие сахраненного
if($replace_row == null){
	//Если нет сахраненного то сахранить

	mysqli_query($db, sprintf("INSERT INTO `расписание`(`дата`, `id_группы`, `дисциплины`) VALUES ('%s','%s','%s')",
		mysqli_real_escape_string($db,$date),
		mysqli_real_escape_string($db,$group),
		mysqli_real_escape_string($db,$lessons)));

} else{
	//Если есть сахраненное, то удалить и заново захранить
	mysqli_query($db, sprintf("DELETE FROM `расписание` WHERE `расписание`.`id_расписания` = '%s'",
		mysqli_real_escape_string($db,$replace_row)));
	mysqli_query($db, sprintf("INSERT INTO `расписание`(`дата`, `id_группы`, `дисциплины`) VALUES ('%s','%s','%s')",
		mysqli_real_escape_string($db,$date),
		mysqli_real_escape_string($db,$group),
		mysqli_real_escape_string($db,$lessons)));

}


mysqli_close($db);