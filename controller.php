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
		$vote = 0;
		$create_date = date("Y-m-d H:i:s");

		$sql = "INSERT INTO questions (q_id,name, email, topic,content,vote,create_date)
		VALUES ('$id','$name', '$email', '$topic', '$content','$vote','$create_date')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	function getQuestions(){
		global $conn;

		$sql = "SELECT * FROM questions ORDER BY q_id DESC";
		$result = mysqli_query($conn, $sql);

		$questions = array();

		while($row = mysqli_fetch_assoc($result)){
			$question = array();
    		$question["q_id"] = $row['q_id'];
    		$question["name"] = $row['name'];
    		$question["email"] = $row["email"];
			$question["topic"] = $row["topic"];
			$question["content"] = $row["content"];
			$question["vote"] = $row["vote"];
			$question["create_date"] = $row["create_date"];
	    	array_push($questions, $question);			
		}
		return $questions;
	}

	function getQuestion($id) {
		global $conn;
		$sql = "SELECT * FROM questions WHERE q_id ='$id'" ;
		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($result);
		$question = array();
		$question["q_id"] = $row['q_id'];
		$question["name"] = $row['name'];
		$question["email"] = $row["email"];
		$question["topic"] = $row["topic"];
		$question["content"] = $row["content"];
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

		$sql = "UPDATE questions SET name='$name', 
				email='$email', content='$content' 
				WHERE q_id= '$id'";

		if (mysqli_query($conn, $sql)) {
			echo "Question is updated successfully.";
		} else {
		    echo "Error updating question: " . mysqli_error($conn);
		}
	}


	/************ FUNCTION FOR ANSWER *************/
	function postAnswer($answer){
		global $conn;

		$q_id = $answer['q_id'];
		$a_id = $answer['a_id'];
		$name = $answer['name'];
	    $email = $answer['email'];
	    $content = $answer['content'];
	   	$vote = 0;
	   	$create_date = date("Y-m-d H:i:s");
	   	echo $q_id;
		$sql = "INSERT INTO answers (q_id,name, email, content,vote, create_date)
		VALUES ('$q_id','$name', '$email', '$content','$vote','$create_date')";

		if (mysqli_query($conn, $sql)) {
		    echo "New answer created successfully";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	function getAnswers($question_id){
		global $conn;

		$sql = "SELECT * FROM answers WHERE q_id = $question_id";
		$result = mysqli_query($conn, $sql);

		$answers = array();		

	    while($row = mysqli_fetch_assoc($result)) {
			$answer = array();
			$answer["q_id"] = $row['q_id'];
			$answer["a_id"] = $row['a_id'];
			$answer["name"] = $row['name'];
			$answer["email"] = $row["email"];
			$answer["content"] = $row["content"];
			$answer["vote"] = $row["vote"];
			$answer["create_date"] = $row["create_date"];
	    	array_push($answers, $answer);
	    }
	
		return $answers;		
	}

	function getAnswerCount($q_id){
		global $conn;

		$sql = "SELECT COUNT(*) as total FROM answers WHERE q_id = ". $q_id;
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$answer_count = $row['total'];
		return $answer_count;
	}

	/************ FUNCTION FOR VOTE (BOTH ASNWER & QUESTION) *************/
	function voteQuestion($q_id,$is_up){
		global $conn;

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $vote = $row['vote'];


		if ($is_up){
			$sql = "UPDATE questions SET vote = vote + 1 WHERE q_id = $q_id";
		}
		else{
			$sql = "UPDATE questions SET vote = vote - 1 WHERE q_id = $q_id";			
		}

		$sql = "SELECT vote FROM questions ";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $vote = $row['vote'];

		if (mysqli_query($conn, $sql)) {
			echo $vote;
		} else {
		    echo "Error updating question: " . mysqli_error($conn);
		}


	}

	function voteAnswer($q_id,$a_id,$is_up){
		global $conn;

		if ($is_up){
			$sql = "UPDATE answers SET vote = vote + 1 WHERE q_id = $q_id AND a_id = $a_id";
		}
		else{
			$sql = "UPDATE answers SET vote = vote - 1 WHERE q_id = $q_id AND a_id = $a_id";			
		}


		$sql = "SELECT vote FROM questions ";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $vote = $row['vote'];

		if (mysqli_query($conn, $sql)) {
			echo $vote;
		} else {
		    echo "Error updating question: " . mysqli_error($conn);
		}

	}

?>
