<?php
include 'Create.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$body = json_decode(file_get_contents('php://input'));

if (
  $_SERVER['REQUEST_METHOD'] === 'POST'
  && isset($body->sku) && isset($body->name)
  && isset($body->price) && isset($body->productType)
  && isset($body->attribute)
) {
  $product = $body;
  $create = new Create($product);
  $create->createProduct();
} else {
  print('Some of the values are missing.');
}
