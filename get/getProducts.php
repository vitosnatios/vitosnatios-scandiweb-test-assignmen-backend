<?php
include 'Read.php';

header("Content-Type: application/json");

$read = new Read();
$data = $read->readData();

echo json_encode($data);
