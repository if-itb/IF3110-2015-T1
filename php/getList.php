<?php

#Sambungan database
require_once("connectDatabase.php");

#Mengambil recently asked question dari database
$query = "select * from questions ORDER BY q_id DESC LIMIT 6";
$result = mysqli_query($link, $query);

#Fetch hasilnya dalam bentuk array
$resArray = array();
while($row =mysqli_fetch_assoc($result))
{
    array_push($resArray,$row);
}

#Encode array menjadi data JSON
$json = json_encode($resArray);

#AJAX response ke client
echo $json;

mysqli_close($link);
