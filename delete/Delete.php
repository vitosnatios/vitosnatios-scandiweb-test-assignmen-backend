<?php
include "../DbConnection.php";

class Delete extends Database
{
  private $ids;
  public function __construct($ids)
  {
    $this->ids = $ids;
    parent::__construct();
  }

  public function deleteDataByIds()
  {
    try {
      $db = $this->getConnection();

      foreach ($this->ids as $id) {
        $query = "DELETE from products WHERE id IN (?)";

        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
          echo "Successfully deleted item with id " . $id . "!";
        } else {
          echo "Some problem on removing item with id " . $id . "!";
        }
        $stmt->close();
      }

      $this->closeConnection();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
