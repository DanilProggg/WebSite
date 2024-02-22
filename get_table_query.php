<?php 
ob_end_clean();
header('Content-Type: application/json');
include_once ("../db.php");

//Получение даты и группы
$date = $_GET['date']; //Месяц
$group = urldecode($_GET['group']); //Номер группы


//Проверка на наличие записаного расписания
$result = mysqli_query($db, "SELECT * FROM расписание WHERE MONTH($date) ORDER BY группа ASC");
	while ($row = mysqli_fetch_array($result)){
		$temp = array($row['дата'] => array(
				"группа"=>$row['id_группы'],
				"расписание"=>json_decode($row['расписание']);
			) 
		);
	}
echo $temp;

mysqli_close($db);