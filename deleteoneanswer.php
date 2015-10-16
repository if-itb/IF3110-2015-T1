<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/15/2015
 * Time: 12:43 AM
 */


$answerID=$_GET["answerID"];


//commencing database access
$servername = "localhost";
$username = "root";
$password = "";
$basisdata= "question";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $basisdata);
//fetching data
$sql = "select question_id from answer where answer_id=$answerID;";
$result = mysqli_query($conn,$sql);
$fetch = mysqli_fetch_assoc($result);
$question_id= $fetch["question_id"];

//system akan menghapus answer terlebih dahulu, jika berhasil lalu akan mengurangi jumlah answer pada database question
$sql =  "delete from answer where answer_id=$answerID;";
if (mysqli_query($conn, $sql)) {
    $sql = "update questions set answers=answers-1 where question_id=$question_id;";
    if (mysqli_query($conn, $sql)) {
        include 'redirecttoquestion.php';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>