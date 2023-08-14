<?php

include_once ("db.php");

$data = json_decode(file_get_contents("php://input"), true);

//$data = json_decode(file_get_contents("log"), true);






if($data['action'] == 'DELETE'){
	$query = sprintf("DELETE FROM `преподаватели` WHERE `преподаватели`.`id_преподавателя` = '%s'",$data['id']);
}
if($data['action'] == 'ADD'){
	$query = sprintf("INSERT INTO `преподаватели`(`фамилия`,`имя`,`отчество`) VALUES ('%s','%s','%s')",$data['surname'],$data['name'],$data['patronymic']);
}



mysqli_query($db, $query);



mysqli_close($db);