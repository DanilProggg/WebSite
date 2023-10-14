<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

//$data = json_decode(file_get_contents("log"), true);



$action = $data['action'];
$subject = $data['object'];



if($action == 'DELETE'){
	$query = sprintf("DELETE FROM `дисциплины` WHERE `дисциплины`.`id_дисциплины` = '%s'",
		mysqli_real_escape_string($db,$subject));
}
if($action == 'ADD'){
	$query = sprintf("INSERT INTO `дисциплины`(`название`) VALUES ('%s')",
		mysqli_real_escape_string($db,$subject));
}




mysqli_query($db, $query);



mysqli_close($db);