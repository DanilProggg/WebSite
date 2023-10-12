<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

//$data = json_decode(file_get_contents("log"), true);



$action = $data['action'];
$subject = $data['object'];
$hours = $data['hours'];


if($action == 'DELETE'){
	$query = sprintf("DELETE FROM `дисциплины` WHERE `дисциплины`.`id_дисциплины` = '%s'",
		mysqli_real_escape_string($db,$subject));
}
if($action == 'ADD'){
	if ($hours == null) {
		$hours = 0;
	}
	$query = sprintf("INSERT INTO `дисциплины`(`название`,`часы`) VALUES ('%s','%s')",
		mysqli_real_escape_string($db,$subject),
		mysqli_real_escape_string($db,$hours));
}

if($action == 'UPDATE'){
	$query = sprintf("UPDATE дисциплины SET `часы`='%s' WHERE `дисциплины`.`id_дисциплины` = '%s'",
		mysqli_real_escape_string($db,$hours),
		mysqli_real_escape_string($db,$subject));
}



mysqli_query($db, $query);



mysqli_close($db);