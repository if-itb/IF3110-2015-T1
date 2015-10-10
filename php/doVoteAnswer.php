<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 06/10/15
 * Time: 14:27
 */

#Sambungan database
require_once("connectDatabase.php");

#ID answer yang akan diVote
$aID = $_POST['aID'];
$operation = $_POST['operation'];  // upVote atau downVote

#Update vote
if($operation=="plus"){
    $query = "UPDATE answers  SET vote = vote + 1 WHERE a_id=$aID";
    mysqli_query($link, $query);
}
else
{
    $query = "UPDATE answers  SET vote = vote -1 WHERE a_id=$aID";
    mysqli_query($link, $query);
}

#Mengambil hasil update vote
$query = "SELECT vote FROM answers WHERE a_id=$aID";
$result = mysqli_query($link, $query);

#Mem-Fetch hasilnya
$row =mysqli_fetch_assoc($result);

#Meng-echo hasilnya sebagai AJAX response
echo $row['vote'];

mysqli_close($link);