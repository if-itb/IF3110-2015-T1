<?php
    $question_id = 0;
    $name = $email = $content = "";
            
    $servername = "localhost";
    $username = "stckxchg";
    $password = "";
    $dbname = "stackExchange";
            
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error . "<br>");
    }
   
       
    $insert_ans = $conn->prepare("INSERT INTO `stackexchange`.`answers` (`question_id`, `name`, `email`, `content`) VALUES (?, ?, ?, ?)");
    $insert_ans->bind_param("isss", $question_id, $name, $email, $content);

    $question_id = $_POST['Question_ID'];
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $content = $_POST['Content']; 
        
    $insert_ans->execute();
    
    $add_ans_count = "UPDATE questions SET answer_count = answer_count + 1 WHERE question_id = $question_id";
    $conn->query($add_ans_count);
    
    $insert_ans->close();
    $conn->close();       

?>
<script type="text/javascript">
    alert('Answer posted.');
    window.location = "../question.php?id=<?php echo $question_id ?>";
</script>