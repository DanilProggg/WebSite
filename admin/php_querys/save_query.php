<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

//$data = json_decode(file_get_contents("log"), true);



$action = mysql_real_escape_string($data['action']);
$object =  mysql_real_escape_string($data['object']);
$lessons = json_encode($data['lessons'], JSON_UNESCAPED_UNICODE);

$result = mysqli_query($db, sprintf("SELECT `id_расписания` FROM `расписание` WHERE `дата`='%s' AND`группа`='%s'", $datee,$group));
$row = mysqli_fetch_array($result);
$replace_row = $row['id_расписания'];
//Проверка на наличие сахраненного
if($replace_row == null){
	//Если нет сахраненного то сахранить

	mysqli_query($db, sprintf("INSERT INTO `расписание`(`дата`, `группа`, `дисциплины`) VALUES ('%s','%s','%s')",$datee,$group,$lessons));

} else{
	//Если есть сахраненное, то удалить и заново захранить
	mysqli_query($db, sprintf("DELETE FROM `расписание` WHERE `расписание`.`id_расписания` = '%s'",$replace_row));
	mysqli_query($db, sprintf("INSERT INTO `расписание`(`дата`, `группа`, `дисциплины`) VALUES ('%s','%s','%s')",$datee,$group,$lessons));

}


mysqli_close($db);