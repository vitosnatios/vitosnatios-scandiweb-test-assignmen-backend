<?php
include 'Delete.php';

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");


if (
  $_SERVER['REQUEST_METHOD'] === 'POST'
) {
  parse_str(file_get_contents('php://input'), $_DELETE);
  $_DELETE = json_encode(urldecode(file_get_contents('php://input')));
  if (file_get_contents('php://input') && $_DELETE) {
    $replaced = str_replace(["id=", '"', "[", "]"], "", $_DELETE);
    $idsArr = explode(',', $replaced);

    $delete = new Delete($idsArr);
    $delete->deleteDataByIds();
  } else {
    echo json_encode('Some of the values are missing.');
  }
} else {
  echo json_encode('Wrong method.');
}
