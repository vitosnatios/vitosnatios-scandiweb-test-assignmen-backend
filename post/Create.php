<?php
include '../DbConnection.php';

class Create extends Database
{
  private $product;
  private $attribute;

  public function __construct($product)
  {
    parent::__construct();
    $this->product = $product;
    $this->attribute = $product->attribute;
  }

  private function getSerializeAttributes()
  {
    return serialize($this->attribute);
  }

  public function createProduct()
  {
    try {
      $db = $this->getConnection();

      $serializedAttribute = $this->getSerializeAttributes();
      $query = "INSERT INTO products (sku, name, price, productType, attribute) VALUES (?, ?, ?, ?, ?)";

      $stmt = $db->prepare($query);
      $stmt->bind_param('ssiss', $this->product->sku, $this->product->name, $this->product->price, $this->product->productType, $serializedAttribute);
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
