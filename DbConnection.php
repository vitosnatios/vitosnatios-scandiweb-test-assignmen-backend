<?php
include 'config.php';

class Database
{
  private $conn;

  public function __construct()
  {
    try {
      $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  protected function getConnection()
  {
    return $this->conn;
  }

  protected function closeConnection()
  {
    return $this->conn->close();
  }
}
