<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$HOST = "localhost";
$USER = "globadpo_globeStatUser";
$PASSWORD = "onmsaTWNjw^Z";
$DB_NAME = "globadpo_globestationers";

// Create connection
$conn = new mysqli($HOST, $USER, $PASSWORD, $DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$select = "select * from quotations order by id";
$result = $conn->query($select);

$data = [];
while($row = $result->fetch_assoc()) {
   array_push($data,$row);
}

echo json_encode($data);

$conn->close();
?>