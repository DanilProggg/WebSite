<?php
	
	$db = mysqli_connect("localhost","root","","tablelist") or die ("Невозможно подключиться к серверу");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
