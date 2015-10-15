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
    
    $questionID = $_POST['Question_ID'];
    $name = $_POST['Name'];
    $email = $_POST['Email']; 
    $topic = $_POST['Topic']; 
    $content = $_POST['Content'];
    
    $update = "UPDATE questions SET name='$name', email='$email', topic='$topic', content='$content'  WHERE question_id=$questionID";
    
    if ($conn->query($update) === TRUE) {
?>
    <script type="text/javascript">
        alert('Question successfully edited.');
        window.location = "../question.php?id=<?php echo $questionID ?>";
    </script>
<?php
} else {
    echo "Error deleting question: " . $conn->error . "<br>";
}

$conn->close();
?>
