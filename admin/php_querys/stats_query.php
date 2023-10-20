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
	if($row['часы'] == null) {
		$row['часы'] = '0';
	}
	//Вычисляем количество пройденых часов
	$result2 = mysqli_query($db, sprintf("SELECT дисциплины
				  FROM расписание
				  WHERE id_группы = '%s' AND дата < CURDATE()",
	mysqli_real_escape_string($db,$group_id)));

	$temp_past_hours = 0;

	while ($row2 = mysqli_fetch_array($result2)){
		$temp_array = json_decode($row2['дисциплины'],true);
		for ($i=1; $i <= 6; $i++) { 
			if ($temp_array[$i]['lesson'] == $row['id_дисциплины']) {
				$temp_past_hours++;
			}
			if ($temp_array[$i.'-2']['lesson'] == $row['id_дисциплины']) {
				$temp_past_hours++;
			}
		}
	}

	$temp = array(
		'id_stats'=> $row['id_статистики'],
		'lesson_name' => $row['название'],
		'planed_hours' => $row['часы'],
		'past_hours' => $temp_past_hours * 2 // Умножаем на два ведь в паре 2 часа

	);
	array_push($lessons, $temp);
}

echo json_encode($lessons,JSON_UNESCAPED_UNICODE);
