<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

//$data = json_decode(file_get_contents("log"), true);



$action = $data['action'];
$object = $data['object'];


if($action == 'DELETE'){
	$query = sprintf("DELETE FROM `дисциплины` WHERE `дисциплины`.`id_дисциплины` = '%s'",
		mysqli_real_escape_string($db,$object));
}
if($action == 'ADD'){
	$query = sprintf("INSERT INTO `дисциплины`(`название`) VALUES ('%s')",
		mysqli_real_escape_string($db,$object));
}



mysqli_query($db, $query);



mysqli_close($db);