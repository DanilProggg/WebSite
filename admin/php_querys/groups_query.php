<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);



$action = $data['action'];
$object = $data['object'];


if($action == 'DELETE'){
	$query = sprintf("DELETE FROM `группы` WHERE `группы`.`id_группы` = '%s'",
		mysqli_real_escape_string($db,$object));
}
if($action == 'ADD'){
	$query = sprintf("INSERT INTO `группы`(`id_группы`) VALUES ('%s')",
		mysqli_real_escape_string($db,$object));
}



mysqli_query($db, $query);



mysqli_close($db);