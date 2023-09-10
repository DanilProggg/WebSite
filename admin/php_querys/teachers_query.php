<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

//$data = json_decode(file_get_contents("log"), true);



$action = $data['action'];
$object = $data['object'];


if($data['action'] == 'DELETE'){
	$query = sprintf("DELETE FROM `преподаватели` WHERE `преподаватели`.`id_преподавателя` = '%s'",
		mysqli_real_escape_string($db,$data['id']));
}
if($data['action'] == 'ADD'){
	$query = sprintf("INSERT INTO `преподаватели`(`фамилия`,`имя`,`отчество`) VALUES ('%s','%s','%s')",
		mysqli_real_escape_string($db,$data['surname']),
		mysqli_real_escape_string($db,$data['name']),
		mysqli_real_escape_string($db,$data['patronymic']));
}



mysqli_query($db, $query);



mysqli_close($db);