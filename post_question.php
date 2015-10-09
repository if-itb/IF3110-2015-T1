<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <?php
            $name = $email = $topic = $content = "";
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "stackExchange";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error . "<br>");
            }
            
            $insert = $conn->prepare("INSERT INTO questions (name, email, topic, content) VALUES (?, ?, ?, ?)");
            $insert->bind_param("ssss", $name, $email, $topic, $content);
                    
            $name = $_POST['Name'];
            $email = $_POST['Email']; 
            $topic = $_POST['Topic']; 
            $content = $_POST['Content']; 
            $insert->execute();
            
            echo "Question stored<br>";
            
            $insert->close();
            $conn->close();

            /* if ($conn->query($insert) === TRUE) {
                echo "Question stored<br>";
            } else {
                echo "Error storing question: " . $conn->error . "<br>";
            } */            
        ?>
    </body>
</html>
