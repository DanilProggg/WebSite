<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$db = mysqli_connect("localhost","root","","tablelist") or die ("Невозможно подключиться к серверу");

