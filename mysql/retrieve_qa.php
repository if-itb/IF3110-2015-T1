<?php

$servername = "localhost";
$username = "stckxchg";
$password = "";
$dbname = "stackExchange";
            
$conn = new mysqli($servername, $username, $password, $dbname);

function retrieveOneQuestion($questionID) {
    global $conn;
    
    $question = array();
    $retrieve_q = "SELECT question_id, name, email, topic, content, vote, time FROM questions WHERE question_id = $questionID";
    $result = $conn->query($retrieve_q);
       
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        //echo "Name: " . $row["name"]. "<br> - E-mail: " . $row["email"]. "<br> - Topic:  " . $row["topic"]. "<br> - Content:  " . $row["content"]. "<br>";
        //$row['answer'] = getAnswerCount($row['question_id']);
        $question[] = $row;     
    }
    
    return $question;
}

function retrieveAnswers($questionID) {
    global $conn;
    
    $answers = array();
    $retrieve_ans = "SELECT name, email, content, vote, time FROM answers WHERE question_id = $questionID ORDER BY vote DESC";
    $result = $conn->query($retrieve_ans);
       
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        //echo "Name: " . $row["name"]. "<br> - E-mail: " . $row["email"]. "<br> - Topic:  " . $row["topic"]. "<br> - Content:  " . $row["content"]. "<br>";
        //$row['answer'] = getAnswerCount($row['question_id']);
        $answers[] = $row;     
    }
        
    $conn->close();
    
    return $answers;
}

?>
