<?php
$user = "tiso";
$password = "baptiso";
$database = "stackExchange";
$link = mysqli_connect("localhost", $user, $password, $database);

/* Cek Koneksi Database */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "select * from questions";
$result = mysqli_query($link, $query);

$resArray = array();
while($row =mysqli_fetch_assoc($result))
{
    array_push($resArray,$row);
}
echo json_encode($resArray);

//close the db connection
mysqli_close($connection);
