<?php
session_start();
	$timezone = date_default_timezone_set("Asia/Taipei");
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "exam";

	$conn = new mysqli($host,$user,$pass,$db);
	if ($conn->connect_errno) {
		echo "Database connection failed: " . $conn->connect_error;
		exit;
	}
?>