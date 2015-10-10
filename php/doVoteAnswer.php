<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 06/10/15
 * Time: 14:27
 */

$user = "tiso";
$password = "baptiso";
$database = "stackExchange";
$link = mysqli_connect("localhost", $user, $password, $database);

/* Cek Koneksi Database */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$aID = $_POST['aID'];
$operation = $_POST['operation'];

if($operation=="plus"){
    $query = "UPDATE answers  SET vote = vote + 1 WHERE a_id=$aID";
    mysqli_query($link, $query);
}
else
{
    $query = "UPDATE answers  SET vote = vote -1 WHERE a_id=$aID";
    mysqli_query($link, $query);
}


$query = "SELECT vote FROM answers WHERE a_id=$aID";
$result = mysqli_query($link, $query);

$row =mysqli_fetch_assoc($result);

//echo $aID;
echo $row['vote'];

mysqli_close($link);