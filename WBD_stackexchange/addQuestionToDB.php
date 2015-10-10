
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
    $questionTopic = $_POST["questionTopic"];
    $questionContent = $_POST["questionContent"];
    $isUpdate = $_POST["update"];
    $questionId = $_POST["questionId"];

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

    //UPDATE OR INSERT
    if ($isUpdate)
    {
        $sql = "UPDATE Questions
            SET name='$name', email='$email', title='$questionTopic', content='$questionContent',date=now()
            WHERE questionId=$questionId";
    } else //isInsert
    {
        $sql = "INSERT INTO Questions (name, email, title, content,date)
          VALUE ('$name', '$email', '$questionTopic', '$questionContent',now())";
    }


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

    Redirect('index.php', false);
?>

