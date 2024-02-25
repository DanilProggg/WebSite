<?php 
ob_end_clean();
header('Content-Type: application/json');
include_once ("../db.php");

//Получение даты и группы
$group = urldecode($_GET['group']); //Номер группы


//Проверка на наличие записаного расписания
$query = sprintf("SELECT * FROM расписание WHERE id_группы = '%s'",
		mysqli_real_escape_string($db,$group));
$result = mysqli_query($db, $query);

echo "[";
while ($row = mysqli_fetch_array($result)){
	//Создание json элемента
	for ($i=1; $i < 7; $i++) { 
		$temp_array = json_decode($row['дисциплины'], true);
		if($temp_array[$i] != null){
			echo '{';
			echo '"title":"'. $i ." ";
			//var_dump($temp_array); 
			$temp_query = sprintf("SELECT название FROM дисциплины WHERE id_дисциплины = '%s'",
				mysqli_real_escape_string($db,$temp_array[$i]["lesson"]));
			$temp_result = mysqli_query($db, $temp_query);
			$temp_row = mysqli_fetch_array($temp_result);
			echo $temp_row["название"];

			$temp_query = sprintf("SELECT * FROM преподаватели WHERE id_преподавателя = '%s'",
				mysqli_real_escape_string($db,$temp_array[$i]["teacher"]));
			$temp_result = mysqli_query($db, $temp_query);
			$temp_row = mysqli_fetch_array($temp_result);
			echo " " . $temp_row["фамилия"]." ".$temp_row["имя"]." ".$temp_row["отчество"];

			$temp_query = sprintf("SELECT * FROM аудитории WHERE id_аудитории = '%s'",
				mysqli_real_escape_string($db,$temp_array[$i]["cabinet"]));
			$temp_result = mysqli_query($db, $temp_query);
			$temp_row = mysqli_fetch_array($temp_result);
			echo " " . $temp_row["номер"];
		
			if($temp_array[$i."-2"] != null){
				$temp_query = sprintf("SELECT название FROM дисциплины WHERE id_дисциплины = '%s'",
				mysqli_real_escape_string($db,$temp_array[$i."-2"]["lesson"]));
				$temp_result = mysqli_query($db, $temp_query);
				$temp_row = mysqli_fetch_array($temp_result);
				echo "/".$temp_row["название"];

				$temp_query = sprintf("SELECT * FROM преподаватели WHERE id_преподавателя = '%s'",
				mysqli_real_escape_string($db,$temp_array[$i."-2"]["teacher"]));
				$temp_result = mysqli_query($db, $temp_query);
				$temp_row = mysqli_fetch_array($temp_result);
				echo " " . $temp_row["фамилия"]." ".$temp_row["имя"]." ".$temp_row["отчество"];

				$temp_query = sprintf("SELECT * FROM аудитории WHERE id_аудитории = '%s'",
				mysqli_real_escape_string($db,$temp_array[$i]["cabinet"]));
				$temp_result = mysqli_query($db, $temp_query);
				$temp_row = mysqli_fetch_array($temp_result);
				echo " " . $temp_row["номер"];
			}
			echo '",';
			echo '"start":"'.$row['дата'];
			echo '"},';
		}
	}
	
}
echo '{"title":"solve","start":"1970-01-01"}]';//Просто что бы закончить json без запятой

mysqli_close($db);