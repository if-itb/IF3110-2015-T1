<?php
  function get_connectqa() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
    return $conn;
  }

  function notNULL($x) {
    if($x == NULL) {
      return 0;
    }
    return $x;
  }
?>