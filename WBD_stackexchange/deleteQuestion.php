<?php
/**
 * Created by PhpStorm.
 * User: Marco Orlando
 * Date: 10/10/2015
 * Time: 10:56 PM
 */


    $questionId = $_GET['questionId'];

    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "WBD1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    //DELETE ANSWERS
    $sql = "DELETE FROM Answers WHERE question_id='$questionId'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }


    //DELETE QUESTION
    $sql = "DELETE FROM Questions WHERE questionId='$questionId'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    Redirect('index.php', false);
?>

