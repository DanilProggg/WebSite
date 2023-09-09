<?php
header("HTTP/1.1 200 OK");
include_once ("../db.php");
 
mysqli_query($db, "DELETE FROM `расписание` WHERE `расписание`.`дата` < CURDATE()");



mysqli_close($db);