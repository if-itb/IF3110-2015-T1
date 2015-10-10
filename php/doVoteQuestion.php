<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 06/10/15
 * Time: 14:27
 */

#Sambungan database
require_once("connectDatabase.php");

#ID pertanyaan yang akan diVote
$qID = $_POST['qID'];
$operation = $_POST['operation'];  // voteUp atau voteDown

#Update vote dari database
if($operation=="plus"){
    $query = "UPDATE questions  SET vote = vote + 1 WHERE q_id=$qID";
    mysqli_query($link, $query);
}
else
{
    $query = "UPDATE questions  SET vote = vote -1 WHERE q_id=$qID";
    mysqli_query($link, $query);
}


#Mengambil vote yang sudah diupdate
$query = "SELECT vote FROM questions WHERE q_id=$qID";
$result = mysqli_query($link, $query);

#Mem-Fetch hasilnya
$row =mysqli_fetch_assoc($result);

#Meng-echo hasilnya sebagai AJAX response
echo $row['vote'];

mysqli_close($link);