<?php
include '../DbConnection.php';

class Create extends Database
{
  private $sku;
  private $name;
  private $price;
  private $productType;
  private $attribute;

  public function __construct($sku, $name, $price, $productType, $attribute)
  {
    parent::__construct();
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    $this->productType = $productType;
    $this->attribute = $attribute;
  }

  public function createProduct()
  {
    try {
      $db = $this->getConnection();

      $query = "INSERT INTO products (sku, name, price, productType, attribute) VALUES (?, ?, ?, ?, ?)";

      $stmt = $db->prepare($query);
      $stmt->bind_param('ssiss', $this->sku, $this->name, $this->price, $this->productType, $this->attribute);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
        echo json_encode(["message" => "Success!"]);
      } else {
        echo json_encode(["message" => "Error to create new product."]);;
      }

      $stmt->close();
      $this->closeConnection();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
