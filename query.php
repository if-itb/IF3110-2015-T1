<?php
define('dbserver','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname','stackex');

$conn = mysqli_connect(dbserver, dbuser, dbpass, dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function updateQuestion($question) {
    global $conn;
    if($question['q_id'] == '') {//belum ada di database
      $query = "INSERT INTO question (topic, content, name, email)
        VALUES ('$question[topic]', '$question[content]', '$question[name]', '$question[email]')";
    } else {//sudah ada di database
      $query = "UPDATE question
        SET topic= '$question[topic]', content='$question[content]', name='$question[name]', email='$question[email]'
        WHERE q_id = $question[q_id]";
    }
    return mysqli_query($conn, $query);
}

function getAllRow($table) {

}

function getQuestion() {

}

function delQuestion() {

}

function addAnswer() {

}

function getAnswer() {

}

function countAnswer() {

}

function updateVote() {

}

function getVote() {

}

?>
