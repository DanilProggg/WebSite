<?php
ob_end_clean();
header('Content-Type: application/json');
include_once ("../db.php");

$group_id = urldecode($_GET['group']);




$result = mysqli_query($db, sprintf("SELECT *
				  FROM статистика
	  			  INNER JOIN дисциплины ON статистика.id_дисциплины = дисциплины.id_дисциплины
				  WHERE `статистика`.`id_группы` = '%s'",
	mysqli_real_escape_string($db,$group_id)));

$lessons = array();
while ($row = mysqli_fetch_array($result)){
	$temp = array(
		'id'=> $row['id_дисциплины'],
		'name' => $row['название']
	);
	array_push($lessons, $temp);
}

echo json_encode($lessons,JSON_UNESCAPED_UNICODE);







