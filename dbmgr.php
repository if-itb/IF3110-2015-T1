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

//return qid jika berhasil
//return 0 jika gagal
function updateQuestion($qid,$Name,$Email,$QuestionTopic,$Content) {
	global $servername,$username,$password,$dbname;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "<p> connection error:". mysqli_connect_error ( void )."</p>";
		return 0;
	}

	$sql = "UPDATE Question 
	SET AuthorName='$Name', Email='$Email', QuestionTopic='$QuestionTopic', Content='$Content'
	WHERE qid=$qid";

	if ($conn->query($sql) === TRUE) {
		echo "<p>Record updated successfully</p>";
		return $qid;
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

//untuk mengambil semua question dan answer count-nya
function getQuestionsAndAnswerCount(){
	//inserts
	global $servername,$username,$password,$dbname;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "<p> connection error:". mysqli_connect_error ( void )."</p>";
		return NULL;
	}

	$sql = "SELECT * FROM Question AS sd LEFT JOIN (SELECT qid,count(aid) AS anscount FROM Answer GROUP BY qid) AS ss ON sd.qid=ss.qid;";

	$result = $conn->query($sql);
	
	$retval = array();

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$retval[]=$row;
	    	}
	} else {
		return NULL;
	}

	return $retval;
}

function searchQuestions($sq){
	echo "<p> SEARCH NOT IMPLEMENTED </p>";
	return getQuestions();
}

//apabila berhasil return true
//apabila gagal return false
function deleteQuestion($qid){
	global $servername,$username,$password,$dbname;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "<p> connection error:". mysqli_connect_error ( void )."</p>";
		return NULL;
	}

	$sql = "DELETE FROM Question WHERE qid=$qid;";

	$result = $conn->query($sql);
	
	return $result;
	
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

//returns array of rows of answers
function getAnswers($qid){
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
		return NULL;
	}

	$sql = "SELECT * FROM Answer WHERE qid=$qid";

	$result = $conn->query($sql);
	
	$retval = array();

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$retval[]=$row;
	    	}
	} else {
		return NULL;
	}

	return $retval;
}

?>
