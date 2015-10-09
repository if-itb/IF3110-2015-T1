


<!--/**
 * Created by PhpStorm.
 * User: Marco Orlando
 * Date: 10/9/2015
 * Time: 6:58 PM
 */-->

<?php
    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }

    $name = $_POST["name"];
    $email = $_POST["email"];
    $questionContent = $_POST["questionContent"];
    $question_id = $_POST["questionId"];

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

    $sql = "INSERT INTO Answers (question_id,name, email,content,date)
          VALUE ('$question_id','$name', '$email', '$questionContent',now())";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

    //Redirect('index.php', false);
?>

