<?php 
require_once 'db.php';

$createTableQuery = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender VARCHAR(100) NOT NULL,
    birth_date DATETIME NOT NULL
    )";

$checkTable = mysqli_query($conn, $createTableQuery) or die(mysqli_error($conn));

$path = 'dataset.txt';
$handle = fopen($path, "r");
$soso = 'category,firstname,lastname,email,gender,birthDate';
$i = 0;

while (($row = fgetcsv($handle)) !== false) {
    mysqli_query($conn, 'insert into clients 
        (category, firstname, lastname, email, gender, birth_date) 
        VALUES 
        ("'.$row[0].'", "'.$row[1].'", "'.$row[2].'" , "'.$row[3].'","'.$row[4].'","'.$row[5].'")') or die(mysqli_error($conn));
}

fclose($handle);

die();


?>