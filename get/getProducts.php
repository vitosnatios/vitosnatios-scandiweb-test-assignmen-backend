<?php
include 'Read.php';

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

$read = new Read();
$data = $read->readData();

echo json_encode($data);
