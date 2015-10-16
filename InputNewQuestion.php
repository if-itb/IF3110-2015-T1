<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/14/2015
 * Time: 5:07 PM
 */

    $servername = "localhost";
    $username = "root";
    $password = "";
    $basisdata= "question";
    // Create connection

    $conn = mysqli_connect($servername, $username, $password, $basisdata);
    //Count questions

    $asked_by = $_POST["Name"];
    $email = $_POST["Email"];
    $topic = $_POST["QuestionTopic"];
    $content = $_POST["Content"];

    $sql = "select max(Question_ID) as lastid from questions;";
    $fetched = mysqli_fetch_assoc(mysqli_query($conn,$sql));
     if ($fetched["lastid"]==NULL){
         $lastid= 0;
     }
     else{
        $lastid = $fetched["lastid"];
     }

    $question_id=$lastid+1;

   $sql = "INSERT INTO `question`.`questions` (`Question_ID`, `Content`, `Asked_by`, `Email`, `Vote_Point`, `Answers`, `datetime`, `QuestionTopic`)
           VALUES ('$question_id', '$content', '$asked_by', '$email', '0', '0', CURRENT_TIMESTAMP, '$topic');";

    if (mysqli_query($conn, $sql)) {
        include 'redirecttoquestion.php';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>