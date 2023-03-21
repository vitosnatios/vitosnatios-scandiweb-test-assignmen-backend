<?php
include '../DbConnection.php';

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
          $data[] = $row;
        }
      }

      $this->closeConnection();
      return $data;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
