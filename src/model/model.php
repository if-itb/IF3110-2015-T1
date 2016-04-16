<?php

require_once '../conf.php';

class Model {
  public function __construct() {
    
  }
  public function executeQuery($sql) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    $conn->query($sql);
    $conn->close();
  }
  public function getResultQuery($sql) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    $arr = [];
    $done = 0;
    if($result = $conn->query($sql)) {
      while($row = $result->fetch_assoc()) {
        $arr[] = $row;
        $done++;
      } 
    }
    $conn->close();
    return $arr;
  }
}


?>