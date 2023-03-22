<?php
include 'Create.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$body = json_decode(file_get_contents('php://input'));


if (
  $_SERVER['REQUEST_METHOD'] === 'POST'
  && isset($body->sku) && isset($body->name)
  && isset($body->price) && isset($body->productType)
  && isset($body->attribute)
) {
  $sku = $body->sku;
  $name = $body->name;
  $price = $body->price;
  $productType = $body->productType;
  $attribute = $body->attribute;

  $create = new Create($sku, $name, $price, $productType, $attribute);
  $create->createProduct();
} else {
  print('Some of the values are missing.');
}
