<?php
	function connect_database() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		
		return $conn;
	}

	function query_process($conn,$sql) {
		$query = mysqli_query($conn,$sql);
		if(!$query) {
			die("Cannot process query: " . mysqli_connect_error());
		}
	}

	function update_database($idx, $conn, $data, $redirect) {
		// $idx = 1 --> insert new question
		if($idx==1){
			$sql = "INSERT INTO `question` (`name`, `email`, `topic`, `content`, `date_created`) VALUES ('".$data["name"]."','".$data["email"]."','".$data["topic"]."','".$data["content"]."',now())";
		}
		// $idx = 2 --> update question
		else if($idx==2) {
			$sql = "UPDATE `question` SET `name`='".$data["name"]."', `email`='".$data["email"]."', `topic`='".$data["topic"]."', `content`='".$data["content"]."' WHERE question_id=".$data["question_id"];
	
		}
		// $idx = 3 --> delete question
		else if($idx==3) {
			$sql = "DELETE FROM `question` WHERE question_id=".$data["question_id"];
			mysqli_query($conn,$sql);
			$sql = "DELETE FROM `answer` WHERE question_id=".$data["question_id"];
		}
		// $idx = 4 --> add new answer
		else if($idx==4) {
			echo 4;
			$sql = "INSERT INTO `answer` (`question_id`, `name`, `email`, `content`) VALUES (".$data["question_id"].",'".$data["name"]."','".$data["email"]."','".$data["content"]."')";
			mysqli_query($conn,$sql);
			header("Location: question.php?q_id=".$data["question_id"]);
			exit(0);
		}
		mysqli_query($conn,$sql);
		header("Location: index.php"); /* Redirect browser */
		exit(0);
	}

	function show_query($result) {
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$q_id = $row["question_id"];
	    		echo "<hr size='5' NOSHADE>";
				echo "<div class=\"question\">";
	    		echo "
	    		<span id=\"vote\">".$row["vote"]."<br>votes</span>
	    		<span id=\"answer\">0<br>answer</span>
	    		<span id=\"question-content\">";
	    		if(isset($row["topic"])) echo "<p id=\"question-title\"><a href='question.php?q_id=$q_id'>".$row["topic"]."</a></p>";
	    		$content = $row["content"];
	    		if(strlen($content)>330) $content=substr($content, 0, 327)."...";
	    		echo "
	    			<p id=\"question-content\">$content</p>
	    		<br>asked by: ".$row["name"]." | <a href='form.php?q_id=$q_id&idx=2'>Edit</a> | <a href='database.php?q_id=$q_id&delete=true'>Delete</a><br>";
				echo "</div>";
	    	}
		}
		else echo "0 Results";
	}

	if(isset($_GET["delete"])) {
		if($_GET["delete"]) {
			$conn = connect_database();
			$data["question_id"] = $_GET["q_id"];
			update_database(3,$conn,$data);
		}
	}
	
?>