<?php

$servername = "localhost";
$username = "IF3110";
$password = "IF3110";
$dbname = "SimpleStackExchange";

//return qid jika berhasil
//return 0 jika gagal
function submitQuestion($Name,$Email,$QuestionTopic,$Content) {
	global $servername,$username,$password,$dbname;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "<p> connection error:". mysqli_connect_error ( void )."</p>";
		return 0;
	}

	$sql = "INSERT INTO Question (AuthorName, Email, QuestionTopic, Content)
	VALUES ('$Name', '$Email', '$QuestionTopic', '$Content')";

	if ($conn->query($sql) === TRUE) {
		echo "<p>New record created successfully</p>";
		return $conn->insert_id;
	} else {
		echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
		return 0;
	}

	
	return 1;
}

//untuk mengambil satu question
//mengembalikan null bila gagal
//mengembalikan hash table dengan isi qid, AuthorName, Email, QuestionTopic, Content, vote, dan created_at
function getQuestion($qid){
	global $servername,$username,$password,$dbname;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "<p> connection error:". mysqli_connect_error ( void )."</p>";
		return NULL;
	}

	$sql = "SELECT qid,AuthorName,Email,QuestionTopic,Content,vote,created_at FROM Question WHERE qid=$qid;";

	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		if($row = $result->fetch_assoc()) {
			return $row;
	    	} else {
			echo "not found";
			return NULL;
		}
	} else {
		echo "not found";
		return NULL;
	}

	return 1;
}
//untuk mengambil satu question
//mengembalikan null bila gagal
//mengembalikan banyak vote
function getVote($qid){
	global $servername,$username,$password,$dbname;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "<p> connection error:". mysqli_connect_error ( void )."</p>";
		return NULL;
	}

	$sql = "SELECT vote FROM Question WHERE qid=$qid;";

	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		if($row = $result->fetch_assoc()) {
			return $row["vote"];
	    	} else {
			echo "not found";
			return NULL;
		}
	} else {
		echo "not found";
		return NULL;
	}

	return 1;
}

//untuk mengambil semua question
function getQuestions(){

}

function deleteQuestion(){

}

//returns aid
//inserts answer
function submitAnswer($qid,$Name,$Email,$Content){
	//check whether $qid exists
	if (getQuestion($qid)==NULL){
		return 0;
	}
		
	//inserts
	global $servername,$username,$password,$dbname;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "<p> connection error:". mysqli_connect_error ( void )."</p>";
		return 0;
	}

	$sql = "INSERT INTO Answer (qid,AuthorName, Email, Content)
	VALUES ('$qid', '$Name', '$Email', '$Content')";

	if ($conn->query($sql) === TRUE) {
		echo "<p>New record created successfully</p>";
		return $conn->insert_id;
	} else {
		echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
		return 0;
	}

	
	return 1;
}

?>
