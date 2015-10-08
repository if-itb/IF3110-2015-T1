<?php

require_once("connectDatabase.php");

$query = "select * from questions ORDER BY q_id DESC LIMIT 5";
$result = mysqli_query($link, $query);

$resArray = array();
while($row =mysqli_fetch_assoc($result))
{
    array_push($resArray,$row);
}
$json = json_encode($resArray);

echo $json; //Mengirim hasil ke client

mysqli_close($link);
