<?php 
ob_end_clean();
header('Content-Type: application/json');
include_once ("db.php");


$date = $_GET['date'];
$group = urldecode($_GET['group']);

$result = mysqli_query($db, sprintf("SELECT `дисциплины` FROM `расписание` WHERE `дата`='%s' AND`группа`='%s'", $date,$group));
$row = mysqli_fetch_array($result);

if($row['дисциплины'] != null ){
	$arr = array (
		"status" =>'OK',
		"lessons" => json_decode($row['дисциплины'],true)
		);
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
} else {
	$arr = array("status" => "EMPTY");

	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}

mysqli_close($db);