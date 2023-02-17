<?php 
$host = "localhost";
$user = "test_task";
$password = "test_task";
$database = "test_task";

date_default_timezone_set('Asia/Tbilisi');
// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("SET CHARACTER SET utf8");


 ?>
