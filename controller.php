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

	/************ FUNCTION FOR QUESTION *************/
	function postQuestion($question){
		global $conn;

		$id = $question['q_id'];
	    $name = $question['name'];
	    $email = $question['email'];
	    $topic = $question['topic'];
	    $content = $question['content'];
	    $update = $question['q_update'];
		$vote = 0;
		$create_date = date("Y-m-d H:i:s");

		$sql = "INSERT INTO question (q_id,name, email, topic,content,q_update,vote,create_date)
		VALUES ('$id','$name', '$email', '$topic', '$content','$update','$vote','$create_date')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	function getQuestions(){
		global $conn;

		$sql = "SELECT * FROM question ORDER BY q_id DESC";
		$result = mysqli_query($conn, $sql);

		$questions = array();

		while($row = mysqli_fetch_assoc($result)){
			$question = array();
    		$question["q_id"] = $row['q_id'];
    		$question["name"] = $row['name'];
    		$question["email"] = $row["email"];
			$question["topic"] = $row["topic"];
			$question["content"] = $row["content"];
			$question["q_udpate"] = $row["q_update"];
			$question["vote"] = $row["vote"];
			$question["create_date"] = $row["create_date"];
	    	array_push($questions, $question);			
		}
		return $questions;
	}

	function getQuestion($id) {
		global $conn;

		$sql = "SELECT * FROM question WHERE q_id = $id". ;
		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($result);

		$question = array();
		$question["q_id"] = $row['q_id'];
		$question["name"] = $row['name'];
		$question["email"] = $row["email"];
		$question["topic"] = $row["topic"];
		$question["content"] = $row["content"];
		$question["q_update"] = $row["q_update"];
		$question["vote"] = $row["vote"];
		$question["create_date"] = $row["create_date"];
		return $question;				
	}

	function updateQuestion($question, $id){
		global $conn;


		$id = $question['q_id'];
	    $name = $question['name'];
	    $email = $question['email'];
	    $topic = $question['topic'];
	    $content = $question['content'];
	    $update = $question['q_update'];

		$sql = " UPDATE question SET name='$name', 
				email='$email', topic='$topic', content='$content' 
				WHERE id= " .$id;

		if (mysqli_query($conn, $query)) {
			echo "Question is updated successfully.";
		} else {
		    echo "Error updating question: " . mysqli_error($conn);
		}
	}

	/************ FUNCTION FOR ANSWER *************/
	function postAnswer($answer){
		global $conn;

		$id = $answer['q_id'];
	    $name = $answer['name'];
	    $email = $answer['email'];
	    $content = $question['content'];
	   	$vote = 0;
	   	$create_date = date("Y-m-d H:i:s");

		$sql = "INSERT INTO answer (q_id,name, email, content,vote, create_date)
		VALUES ('$id','$name', '$email', '$content','$vote','$create_date')";

		if (mysqli_query($conn, $sql)) {
		    echo "New answer created successfully";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	function getAnswers($question_id){
		global $conn;

		$sql = "SELECT * FROM answer WHERE q_id = $question_id";
		$result = mysqli_query($conn, $sql);

		$answers = array();		

	    while($row = mysqli_fetch_assoc($result)) {
			$answer = array();
			$answer["q_id"] = $row['q_id'];
			$answer["name"] = $row['name'];
			$answer["email"] = $row["email"];
			$answer["content"] = $row["content"];
			$answer["vote"] = $row["vote"];
			$answer["create_date"] = $row["create_date"];
	    	array_push($answers, $answer);
	    }
	
		return $answers;		
	}

	/************ FUNCTION FOR VOTE (BOTH ASNWER & QUESTION) *************/
	function vote($id,$is_question,$is_up){
		global $conn;

		if ($is_question){
			$database = "question";
		}
		else{
			$database = "answer";
		}

		if ($is_up){
			$sql = "UPDATE $database SET vote = vote + 1 WHERE $q_id = $id";
		}
		else{
			$sql = "UPDATE $database SET vote = vote - 1 WHERE $q_id = $id";			
		}

		if (mysqli_query($conn, $sql)) {
		    echo "Vote Success";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


?>
