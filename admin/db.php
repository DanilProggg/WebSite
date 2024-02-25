<?php
	
	$db = mysqli_connect("localhost","root","","tablelist") or die ("Failed to connect to MySQL");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
