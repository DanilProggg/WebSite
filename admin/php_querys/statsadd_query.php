<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

$action = $data['action'];
$name = $data['name'];
$id = $data['id'];



if($action == 'ADD'){

	$query = sprintf("INSERT INTO `статистика`(`id_группы`,`id_дисциплины`) VALUES ('%s','%s')",
		mysqli_real_escape_string($db,$id),
		mysqli_real_escape_string($db,$name));
}




mysqli_query($db, $query);
mysqli_close($db);







