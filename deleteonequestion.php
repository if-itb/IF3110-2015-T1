<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/15/2015
 * Time: 12:43 AM
 */


$questionID=$_GET["questionID"];


//commencing database access
$servername = "localhost";
$username = "root";
$password = "";
$basisdata= "question";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $basisdata);
//fetching data
$sql =  "delete from answer where question_id=$questionID";
if (mysqli_query($conn, $sql)) {
    $sql = "delete from questions where question_id=$questionID";
    if (mysqli_query($conn, $sql)) {
        include 'redirecting.php';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>