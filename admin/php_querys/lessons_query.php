<?php

include_once ("../db.php");

$data = json_decode(file_get_contents("php://input"), true);

//$data = json_decode(file_get_contents("log"), true);



$action = mysql_real_escape_string($data['action']);
$object =  mysql_real_escape_string($data['object']);


if($action == 'DELETE'){
	$query = sprintf("DELETE FROM `дисциплины` WHERE `дисциплины`.`id_дисциплины` = '%s'",$object);
}
if($action == 'ADD'){
	$query = sprintf("INSERT INTO `дисциплины`(`название`) VALUES ('%s')",$object);
}



mysqli_query($db, $query);



mysqli_close($db);