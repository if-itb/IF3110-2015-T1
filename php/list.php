<?php

require_once("connectDatabase.php");

$query = "select * from questions ORDER BY q_id DESC";
$result = mysqli_query($link, $query);

$resArray = array();
while($row =mysqli_fetch_assoc($result))
{
    array_push($resArray,$row);
}
$res = json_encode($resArray);

echo $res; //Mengirim hasil ke client

//close the db connection
mysqli_close($link);
