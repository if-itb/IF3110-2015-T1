<?php
    $name = $email = $topic = $content = "";
            
    $servername = "localhost";
    $username = "stckxchg";
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
    
    $insert->close();
    $conn->close();       
?>
<script type="text/javascript">
    alert('Question posted, you will be automatically redirected to home.');
    window.location = "../index.php";
</script>