<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

//$data = json_decode(file_get_contents("log"), true);



$action = mysql_real_escape_string($data['action']);
$object =  mysql_real_escape_string($data['object']);


if($action == 'DELETE'){
	$query = sprintf("DELETE FROM `аудитории` WHERE `аудитории`.`id_аудитории` = '%s'",$object);
}
if($action == 'ADD'){
	$query = sprintf("INSERT INTO `аудитории`(`номер`) VALUES ('%s')",$object);
}



mysqli_query($db, $query);



mysqli_close($db);