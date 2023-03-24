<?php
include '../DbConnection.php';
include '../Product/Furniture.php';
include '../Product/Dvd.php';
include '../Product/Book.php';

class Read extends Database
{
  public function readData()
  {
    try {
      $db = $this->getConnection();

      $query = "SELECT * FROM products";
      $result = $db->query($query);

      $data = [];

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $rowType = $row['productType'];
          $product = null;
          if ($rowType === 'furniture') {
            $product = new Furniture($row);
          } else if ($rowType === 'dvd') {
            $product = new Dvd($row);
          } else if ($rowType === 'book') {
            $product = new Book($row);
          }
          $formated = $product->getFormatedAttributes();
          $data[] = $formated;
        }
      }

      $this->closeConnection();
      return $data;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
