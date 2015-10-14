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

    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }

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
		    Redirect('./index.php', false);		} 
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
		    Redirect('./index.php', false);		
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

		$sql = "SELECT * FROM questions WHERE q_id = $q_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $vote = $row['vote'];
		if ($is_up == "true"){
			$vote = $vote + 1;
		}
		else{
			$vote = $vote - 1;
		}

		$sql = "UPDATE questions SET vote=$vote WHERE q_id=$q_id";

		if (mysqli_query($conn, $sql)) {
			echo "<p>$vote</p>";
		} else {
		    echo "Error Vote Question: " . mysqli_error($conn);
		}

	}

	function voteAnswer($q_id,$a_id,$is_up){
		global $conn;

		$sql = "SELECT * FROM answers WHERE q_id = $q_id AND a_id = $a_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $vote = $row['vote'];

		if ($is_up == "true"){
			$vote = $vote + 1;
		}
		else{
			$vote = $vote - 1;
		}

		$sql = "UPDATE answers SET vote=$vote WHERE q_id=$q_id AND a_id = $a_id";

		if (mysqli_query($conn, $sql)) {
			echo "<p>$vote</p>";
		} else {
		    echo "Error Vote Answer: " . mysqli_error($conn);
		}
	}

	/************ FUNCTION FOR SEARCHING BAR *************/
	function searchQuestion($keyword){
		global $conn;

		$sql = "SELECT * FROM questions WHERE topic LIKE '%$keyword%' OR content LIKE '%$keyword%' ORDER BY q_id DESC";
		$result = mysqli_query($conn, $sql);

		$questions = array();

	    while($row = mysqli_fetch_assoc($result)) {
			$question = array();
    		$question["q_id"] = $row['q_id'];
    		$question["name"] = $row['name'];
			$question["topic"] = $row["topic"];
			$question["content"] = $row["content"];
			$question["vote"] = $row["vote"];
			$question["create_date"] = $row["create_date"];
	    	array_push($questions, $question);
	    }

		return $questions;
	}



?>
