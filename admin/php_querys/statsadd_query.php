<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

$action = $data['action'];
$lessonId = $data['lesId'];
$id = $data['id'];



if($action == 'ADD'){

	$query = sprintf("INSERT INTO `статистика`(`id_группы`,`id_дисциплины`) VALUES ('%s','%s')",
		mysqli_real_escape_string($db,$id),
		mysqli_real_escape_string($db,$lessonId));
}

if($action == 'DELETE'){

	$query = sprintf("DELETE FROM статистика WHERE id_группы = '%s' AND id_дисциплины = '%s'",
		mysqli_real_escape_string($db,$id),
		mysqli_real_escape_string($db,$lessonId));
}

if($action == 'UPDATE'){
	$hours = $data['hours'];
	$query = sprintf("UPDATE статистика SET часы = '%s' WHERE id_статистики = '%s'",
		mysqli_real_escape_string($db,$hours),
		mysqli_real_escape_string($db,$id));
}



mysqli_query($db, $query);
mysqli_close($db);







