<?php

class Database
{
  private $conn;

  public function __construct(private $serverName = "localhost", private $userName = 'root', private $password = '', private $dbName = 'softcompany')
  {
    $this->conn = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);

    if (!$this->conn) {
      die("Error Connect : " . mysqli_connect_error());
    }
  }

  // insert new record in database/021
  public function insert($sql)
  {
    if (mysqli_query($this->conn, $sql)) {
      return "Your data is registered";
    } else {
      die("Error: " . mysqli_error($this->conn));
    }
  }

  // read data from database
  public function read($table)
  {
    $sql = "SELECT * FROM $table";

    $result = mysqli_query($this->conn, $sql);

    $data = [];

    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $data[] = $row;
        }
      }
      return $data;
    } else {
      die("Error: " . mysqli_error($this->conn));
    }
  }

  // find record in database
  public function find($table, $id)
  {
    $sql = "SELECT * FROM $table WHERE `id` = $id";

    $result = mysqli_query($this->conn, $sql);

    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
      }
      return false;
    } else {
      die("Error: " . mysqli_error($this->conn));
    }
  }

  public function update($sql)
  {
    if (mysqli_query($this->conn, $sql)) {
      return 'Your data is updated';
    } else {
      die("Error: " . mysqli_error($this->conn));
    }
  }

  public function delete($table, $id)
  {
    $sql = "DELETE FROM $table WHERE `id` = $id";

    if (mysqli_query($this->conn, $sql)) {
      return "Your data is deleted";
    }

  }


  public function enc_password($password)
  {
    return sha1($password);
  }
}

