<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/15/2015
 * Time: 8:33 PM
*/
$questionID = $_GET["questionID"];

//commencing database access
$servername = "localhost";
$username = "root";
$password = "";
$basisdata= "question";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $basisdata);
//fetching data

//system akan meningkatkan jumlah vote di database
$sql = "update questions set vote_point=vote_point+1 where question_id=$questionID;";
$result = mysqli_query($conn,$sql);

//pengaksesan kembali terhadap jumlah vote pada database, sehingga tidak sembarang +1 pada ajax
$sql = "select vote_point from questions where question_id=$questionID;";
$result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
$vote_point = $result["vote_point"];

    echo $vote_point;

?>