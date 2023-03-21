<?php
include 'Create.php';

if (
  $_SERVER['REQUEST_METHOD'] === 'POST'
  && isset($_POST['sku']) && isset($_POST['name'])
  && isset($_POST['price']) && isset($_POST['productType'])
  && isset($_POST['attribute'])
) {
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $productType = $_POST['productType'];
  $attribute = $_POST['attribute'];

  $create = new Create($sku, $name, $price, $productType, $attribute);
  $create->createProduct();
} else {
  print('Some of the values are missing.');
}
