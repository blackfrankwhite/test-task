<?php 

require_once 'src/db.php';
require_once 'src/DataHandler.php';

$query = 'SELECT * FROM clients';

$dataHandler = new DataHandler($conn);

$filterCounter = 0;

if (isset($_GET['category'])) {
    $data = $dataHandler->classicColumn($_GET['category']);
    $query .= $filterCounter == 0 ? ' WHERE category = "'.$data.'"' : ' and category = "'.$data.'"'; 
    $filterCounter ++;
}

if (isset($_GET['gender'])) {
    $data = $dataHandler->classicColumn($_GET['gender']);
    $query .= $filterCounter == 0 ? ' WHERE gender = "'.$data.'"' : ' and gender = "'.$data.'"'; 
    $filterCounter ++;
}

if (isset($_GET['birth_date'])) {
    $data = $dataHandler->birthDateColumn($_GET['birth_date']);
    $query .= $filterCounter == 0 ? ' WHERE birth_date = "'.$data.'"' : ' and birth_date = "'.$data.'"';
    $filterCounter ++;
}

if (isset($_GET['age'])) {
    $data = $dataHandler->ageColumn($_GET['age']);
    $query .= $filterCounter == 0 ? ' WHERE birth_date = "'.$data.'"' : ' and birth_date = "'.$data.'"';
    $filterCounter ++;
}

if (isset($_GET['age_from'])) {
    $data = $dataHandler->ageColumn($_GET['age_from']);
    $query .= $filterCounter == 0 ? ' WHERE birth_date < "'.$data.'"' : ' and birth_date < "'.$data.'"';
    $filterCounter ++;
}

if (isset($_GET['age_to'])) {
    $data = $dataHandler->ageColumn($_GET['age_to']);
    $query .= $filterCounter == 0 ? ' WHERE birth_date > "'.$data.'"' : ' and birth_date >  "'.$data.'"';
    $filterCounter ++;
}


$clients = mysqli_query($conn, $query) or die(mysqli_error($conn));

$outputArray = array();


while ($client = $clients->fetch_assoc()) {
    $outputArray[] = $client;
}

echo json_encode($outputArray);


?>