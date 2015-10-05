<?php
    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
    if( $_SERVER['REQUEST_METHOD']=='POST'){
        $username = 'root';
        $password = '';
        $database = 'stackex';
        $conn = new mysqli('localhost', $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $name = $_POST["name"];
        $email = $_POST["email"];
        $topic = $_POST["topic"];
        $content = $_POST["content"];
        $sql = "INSERT INTO questions(topic, content, author, vote, email)
                        VALUES('$topic','$content','$name',0,'$email')";
        if ($conn->query($sql) === TRUE) {
            //nothing. YAyy correct
        }
        $conn->close();
    }
    Redirect('index.php', false);
?>