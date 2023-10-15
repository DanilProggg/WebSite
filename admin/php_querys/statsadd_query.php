<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

$action = $data['action'];
$name = $data['name'];
$id = $data['id'];



if($action == 'ADD'){
	$result = mysqli_query($db, sprintf("SELECT * FROM `дисциплины` WHERE `название`='%s'", 
		mysqli_real_escape_string($db,$name)));
	$row = mysqli_fetch_array($result);

	$query = sprintf("INSERT INTO `статистика`(`id_группы`,`id_дисциплины`) VALUES ('%s','%s')",
		mysqli_real_escape_string($db,$id),
		mysqli_real_escape_string($db,$row['id_дисциплины']));
}




mysqli_query($db, $query);
mysqli_close($db);







