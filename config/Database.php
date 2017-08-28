<?php
/**
 * Created by PhpStorm.
 * User: SAJID
 * Date: 8/19/2017
 * Time: 11:20 AM
 */

class Database
{
  private $username = 'root';
  private $password = '';
  private $host = 'localhost';
  private $db_name = 'product_rest_api';
  public $conn;

  public function getConnection()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
    } catch (PDOException $e) {
      echo("Connection Error" . $e->getMessage());
    }
    return $this->conn;
  }
}
?>