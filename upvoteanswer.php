<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/15/2015
 * Time: 8:33 PM
 */
$answerID = $_GET["answerID"];

//commencing database access
$servername = "localhost";
$username = "root";
$password = "";
$basisdata= "question";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $basisdata);
//fetching data

//system akan meningkatkan jumlah vote di database
$sql = "update answer set vote=vote+1 where answer_id=$answerID;";
$result = mysqli_query($conn,$sql);

//pengaksesan kembali terhadap jumlah vote pada database, sehingga tidak sembarang +1 pada ajax
$sql = "select vote from answer where answer_id=$answerID;";
$result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
$vote_point = $result["vote"];

echo $vote_point;

?>