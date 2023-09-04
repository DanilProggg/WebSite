<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

//$data = json_decode(file_get_contents("log"), true);



$datee = $data['date'];
$group =  $data['group'];
$lessons = json_encode($data['lessons'], JSON_UNESCAPED_UNICODE);

$result = mysqli_query($db, sprintf("SELECT `id_расписания` FROM `расписание` WHERE `дата`='%s' AND`группа`='%s'", $datee,$group));
$row = mysqli_fetch_array($result);
$replace_row = $row['id_расписания'];
if($replace_row == null){

	mysqli_query($db, sprintf("INSERT INTO `расписание`(`дата`, `группа`, `дисциплины`) VALUES ('%s','%s','%s')",$datee,$group,$lessons));

} else{
	 
	mysqli_query($db, sprintf("DELETE FROM `расписание` WHERE `расписание`.`id_расписания` = '%s'",$replace_row));
	mysqli_query($db, sprintf("INSERT INTO `расписание`(`дата`, `группа`, `дисциплины`) VALUES ('%s','%s','%s')",$datee,$group,$lessons));

}


mysqli_close($db);