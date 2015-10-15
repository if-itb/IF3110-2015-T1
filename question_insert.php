<?php

    $name = $_POST ["name"];
    $email = $_POST["email"];
    $topic = $_POST["topic"];
    $content = $_POST["content"];

    //menyambungkan ke databases
    $link = mysqli_connect("127.0.0.1", "root", "", "WBD");

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }


    //memasukkan query ke databases 
    $query = "insert into question (no_question,name,email,topic,content,answer,vote) values (NULL, '$name' ,'$email','$topic','$content', 0,0)";

    if ($link->query($query) === TRUE) 
    {
        echo "New record created successfully";
    }
    else
    {
        echo "Error: " . $query . "<br>" . $link->error;
    }


    mysqli_close($link);
    header("Location: list.php");

?>


