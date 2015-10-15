<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = 'stackexchange';

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$sql = "
	SELECT question.*, count(answerId) AS number_of_answers 
	FROM question LEFT JOIN answer
	ON question.questionId = answer.questionId
	GROUP BY question.questionId;
	";

$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "Question id: " . $row["questionId"] . "<br>";
		echo "Topic: " . $row["topic"] . "<br>";
		echo "Content: " . $row["content"] . "<br>";
		echo "Votes: " . $row["votes"] . "<br>";
		echo "Answers: " . $row["number_of_answers"] . "<br>";
		echo "Asked by: " . $row["asker"] . "<br>";
		echo "<hr>";
	}
}

$conn->close();
?>