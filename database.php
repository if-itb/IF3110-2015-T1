<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create Connection
$conn = mysqli_connect($servername,$username,$password,"stackexchange");

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysqli_set_charset($conn,'utf8');

function getQuestions($searchQuery = "", $sort = "date DESC") {
	global $conn;

	if ($searchQuery == "")
		$q = "SELECT * FROM question ORDER BY $sort";
	else
		$q = "SELECT * FROM question WHERE title LIKE '%$searchQuery%' OR content LIKE '%$searchQuery%' ORDER BY $sort";
	$rq = mysqli_query($conn, $q);

	$r = array();
	while ($row = mysqli_fetch_array($rq, MYSQLI_ASSOC)) {
		$row['answer'] = getAnswerCount($row['question_id']);
		$r[] = $row;		
	}
	return $r;
}


function getQuestion($id) 
{
	global $conn;
	$question = "SELECT * FROM question WHERE question_id=$id";
	$rq = mysqli_query($conn, $question);

	$row = mysqli_fetch_array($rq, MYSQLI_ASSOC);
	return $row;
}

function postQuestion($data)
{
	global $conn;
	$question = NULL;
	if ($data['question_id'] == '')
	{
		//create new question
		$question = "INSERT INTO question (name, email, title, content, date)
			VALUES ('$data[name]', '$data[email]', '$data[title]', '$data[content]', CURRENT_TIMESTAMP)";
	} 
	else 
	{
		//update question
		$question = "UPDATE question
			SET
				name='$data[name]',
				email='$data[email]',
				title='$data[title]',
				content='$data[content]'
			WHERE
				question_id = $data[question_id]";
	}
				      
	$q = mysqli_query($conn, $question);
	return $q;
}

function getAnswerCount($questionId) {
	global $conn;
	$q = "SELECT COUNT(answer_id) AS c FROM answer WHERE question_id=$questionId";
	$rq = mysqli_query($conn, $q);
	$r = mysqli_fetch_array($rq, MYSQLI_ASSOC)['c'];
	return $r;
}


?>