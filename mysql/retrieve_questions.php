<?php

$servername = "localhost";
$username = "stckxchg";
$password = "";
$dbname = "stackExchange";
            
$conn = new mysqli($servername, $username, $password, $dbname);

function retrieveQuestions($keyword) {
    global $conn;
    
    $questions = array();
    if ($keyword == "") {
        $retrieve_q = "SELECT question_id, name, email, topic, content, vote, answer_count, time FROM questions ORDER BY time DESC";
    } else {
        $retrieve_q = "SELECT question_id, name, email, topic, content, vote, answer_count, time FROM questions WHERE topic LIKE '%$keyword%' OR content LIKE '%$keyword%'ORDER BY time DESC";
    }
    $result = $conn->query($retrieve_q);
       
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        //echo "Name: " . $row["name"]. "<br> - E-mail: " . $row["email"]. "<br> - Topic:  " . $row["topic"]. "<br> - Content:  " . $row["content"]. "<br>";
        //$row['answer'] = getAnswerCount($row['question_id']);
        $questions[] = $row;     
    }
        
    $conn->close();
    
    return $questions;
    
}

?>