<?php

require_once("new_config.php");

class Database {

  public $connection;

  function __construct() {

    // this will open automatically
    $this->open_db_connection();

  }

  // functions are METHODS IN OOP PHP
  public function open_db_connection() {

    // $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($this->connection->connect_errno) {
      die("Database connection failed" . $this->connection->connect_errno);
    }

  }

  public function query($sql) {

    $result = $this->connection->query($sql);

    $this->confirm_query($result);

    return $result;

  }

  private function confirm_query($result) {
    if(!$result) {
      die("Query Failed" . $this->connection->error);
    }
  }

  public function escape_string($string) {
    $escaped_string = $this->connection->real_escape_string($string);
    return $escaped_string;
  }

  public function the_instert_id() {
    return $this->connection->insert_id;
  }

}

$database = new Database();




















 ?>
