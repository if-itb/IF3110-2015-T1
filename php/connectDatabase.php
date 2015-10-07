<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 07/10/15
 * Time: 18:48
 */

#Koneksi ke Database
$user = "tiso";
$password = "baptiso";
$database = "stackExchange";
$link = mysqli_connect("localhost", $user, $password, $database);


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}