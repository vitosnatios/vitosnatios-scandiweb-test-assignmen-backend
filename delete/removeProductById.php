<?php
include 'Delete.php';

if (
  $_SERVER['REQUEST_METHOD'] === 'DELETE'
) {
  parse_str(file_get_contents('php://input'), $_DELETE);

  if (file_get_contents('php://input') && $_DELETE['id']) {
    $replaced = str_replace(["'", "[", "]"], '', $_DELETE['id']);
    $idsArr = explode(',', $replaced);

    $delete = new Delete($idsArr);
    $delete->deleteDataByIds();
  } else {
    echo 'Some of the values are missing.';
  }
} else {
  echo 'Wrong method.';
}
