<?php

function db_init()
{
  $srv = "localhost";
  $usr = "root";
  $pwd = "";

  $conn = mysqli_connect($srv, $usr, $pwd);
  if (!$conn)
  {
    die("Connection failed: " .mysqli_connect_error(). "\nQuery aborted");
  }
  mysqli_select_db($conn, "stackexchange");
  return $conn;
}