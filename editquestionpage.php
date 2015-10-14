<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/15/2015
 * Time: 2:17 AM
*/
$questionID=$_GET["questionID"];
//commencing database access
$servername = "localhost";
$username = "root";
$password = "";
$basisdata= "question";
// Create connection

$asked_by = $_POST["Name"];
$email = $_POST["Email"];
$topic = $_POST["QuestionTopic"];
$content = $_POST["Content"];

$conn = mysqli_connect($servername, $username, $password, $basisdata);
//fetching data
$sql = "update questions
        set asked_by = '$asked_by',
            email = '$email',
            questiontopic = '$topic',
            content = '$content'
        where question_id= '$questionID';
";

    if (mysqli_query($conn, $sql)) {
        include 'redirecting.php';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


?>