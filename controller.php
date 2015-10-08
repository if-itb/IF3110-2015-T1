<?php

	DEFINE('DB_HOST','localhost');
	DEFINE('DB_USER','root');
	DEFINE('DB_PASSWORD','alberttriadrian');
	DEFINE('DB_NAME','simplestackexchange');

	// Create connection
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	mysqli_set_charset($dbc,'utf8');
	// Check connection
	if (!$conn){
	    die("Connection failed: " . mysqli_connect_error());
	} 

	/* if( $_SERVER['REQUEST_METHOD']=='POST'){

		$servername = "localhost";
		$username = "root";
		$password = "alberttriadrian";
		$dbname = "simplestackexchange";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn){
		    die("Connection failed: " . mysqli_connect_error());
		} 

	    $name = $_POST["name"];
	    $email = $_POST["email"];
	    $topic = $_POST["topic"];
	    $content = $_POST["content"];

		$sql = "INSERT INTO question2 (name, email, topic,content)
		VALUES ('$name', '$email', '$topic', '$content')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		mysqli_close($conn);
	}*/

	function postQuestion($question){
		global $conn;
	    $name = $question['name'];
	    $email = $question['email'];
	    $topic = $question['topic'];
	    $content = $question['content'];
		$sql = "INSERT INTO question2 (name, email, topic,content)
		VALUES ('$name', '$email', '$topic', '$content')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}

	function getQuestions(){
		global $conn;

		$sql = "SELECT * FROM question2 ORDER BY q_id DESC";
		$result = mysqli_query($conn, $query);

		$questions = array();

		while($row = mysqli_fetch_assoc($questions)){
			$question = array();
    		$question["id"] = $row['id'];
    		$question["name"] = $row['name'];
    		$question["email"] = $row["email"];
			$question["topic"] = $row["topic"];
			$question["content"] = $row["content"];
	    	array_push($questions, $question);			
		}
		return $questions;
	}


?>
