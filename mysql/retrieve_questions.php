<?php

$servername = "localhost";
$username = "stckxchg";
$password = "";
$dbname = "stackExchange";
            
$conn = new mysqli($servername, $username, $password, $dbname);

function retrieveQuestions() {
    global $conn;
    
    $questions = array();
    $retrieve_all_q = "SELECT question_id, name, email, topic, content, vote, time FROM questions";
    $result = $conn->query($retrieve_all_q);
       
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        //echo "Name: " . $row["name"]. "<br> - E-mail: " . $row["email"]. "<br> - Topic:  " . $row["topic"]. "<br> - Content:  " . $row["content"]. "<br>";
        //$row['answer'] = getAnswerCount($row['question_id']);
        $questions[] = $row;     
    }
    
    return $questions;
        
    $conn->close();
}

?>