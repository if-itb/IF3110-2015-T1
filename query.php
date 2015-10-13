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

function getAllQuestions() {
  global $conn;
  $query = "SELECT * FROM question ORDER BY date_posted DESC";
  $result = mysqli_query($conn, $query);
  return $result;
}

function getQuestion($q_id) {
  global $conn;
  $query = "SELECT * FROM question WHERE q_id=$q_id ORDER BY date_posted DESC";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  return $row;
}

function delQuestion() {

}

function addAnswer() {
  global $conn;
  $query = "INSERT INTO answer (q_id, content, name, email)
    VALUES ('$answer[q_id])', '$answer[content]', '$answer[name]', '$answer[email]')";
  return mysqli_query($conn, $query);
}

function getAnswers($q_id) {
  global $conn;
  $query = "SELECT * FROM answer WHERE q_id=$q_id ORDER BY vote DESC";
  $result = mysqli_query($conn, $query);
  return $result;
}

function countAnswer($q_id) {
  global $conn;
  $query = "SELECT COUNT(a_id) AS count FROM answer WHERE q_id=$q_id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  return $row['count'];
}

function updateVote() {

}

function getVote($table, $id) {
  global $conn;
  $query = "SELECT vote FROM $table WHERE ".$table[0]."_id=$id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  return $row['vote'];
}

?>
