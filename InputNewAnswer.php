<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/14/2015
 * Time: 5:07 PM
 */
$question_id=$_GET["questionID"];

$servername = "localhost";
$username = "root";
$password = "";
$basisdata= "question";
// Create connection

$conn = mysqli_connect($servername, $username, $password, $basisdata);
//Count questions

$answered_by = $_POST["Name"];
$email = $_POST["Email"];
$content = $_POST["Content"];

$sql = "select max(answer_id) as lastid from answer;";
$fetched = mysqli_fetch_assoc(mysqli_query($conn,$sql));
if ($fetched["lastid"]==NULL){
    $lastid= 0;
}
else{
    $lastid = $fetched["lastid"];
}

$answer_id=$lastid+1;

$sql = "INSERT INTO `question`.`answer` (`question_id`, `answer_id`, `Content`, `answered_by`, `Email`, `Vote`, `datetime`)
           VALUES ('$question_id','$answer_id', '$content', '$answered_by', '$email', '0', CURRENT_TIMESTAMP);";

if (mysqli_query($conn, $sql)) {
    $sql = "update questions set answers=answers+1 where question_id=$question_id;";
    if (mysqli_query($conn, $sql)) {
        include 'redirecttoquestion.php';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>