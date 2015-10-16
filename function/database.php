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

	function update_database($idx, $conn, $data) {
		// $idx = 1 --> insert new question
		if($idx==1){
			$sql = "INSERT INTO `question` (`name`, `email`, `topic`, `content`, `date_created`) VALUES ('".$data["name"]."','".$data["email"]."','".$data["topic"]."','".mysql_real_escape_string($data["content"])."',now())";
		}
		// $idx = 2 --> update question
		else if($idx==2) {
			$sql = "UPDATE `question` SET `name`='".$data["name"]."', `email`='".$data["email"]."', `topic`='".$data["topic"]."', `content`='".mysql_real_escape_string($data["content"])."' WHERE question_id=".$data["question_id"];
	
		}
		// $idx = 3 --> delete question
		else if($idx==3) {
			$sql = "DELETE FROM `question` WHERE question_id=".$data["question_id"];
			mysqli_query($conn,$sql);
			$sql = "DELETE FROM `answer` WHERE question_id=".$data["question_id"];
			header("Location: ../index.php"); /* Redirect browser */
			exit(0);
		}
		// $idx = 4 --> add new answer
		else if($idx==4) {
			echo "sampai sini";
			$sql = "INSERT INTO `answer` (`question_id`, `name`, `email`, `content`, `date_created`) VALUES (".$data["question_id"].",'".$data["name"]."','".$data["email"]."','".mysql_real_escape_string($data["content"])."',now())";
			mysqli_query($conn,$sql);
			header("Location: question.php?q_id=".$data["question_id"]);
			exit(0);
		}
		mysqli_query($conn,$sql);
		header("Location: index.php"); /* Redirect browser */
		exit(0);
	}

	function show_query_ask($result) {
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$q_id = $row["question_id"];
				if(isset($row["topic"])) echo "<h2>".$row["topic"]."</h2>";
	    		echo "<hr size='2' NOSHADE>";
				echo "<div class=\"question\">";
	    		echo "
	    		<span class=\"vote\"><img src=\"icon/arrow_up.png\" onclick = Update_Vote(1,1,".$q_id.") style=\"width: 80%; height: auto; margin-bottom: 5px;\"></img><div id=\"vote_question".$q_id."\">".$row["vote"]."</div><img src=\"icon/arrow_down.png\" onclick = Update_Vote(0,1,".$q_id.") style=\"width: 80%; height: auto; margin-top: 5px;\"></img></span>
	    		<span id=\"question\">";
	    		$content = $row["content"];
	    		echo "
	    			<p id=\"question-content\">$content</p>
	    		</span>
	    		<div class=\"identity\">
	    		<br>asked by: <span id=\"name\">".$row["name"]."</span> at ".$row["date_created"]." | <a id=\"edit\" href='form.php?q_id=$q_id&idx=2'>Edit</a> | <a id=\"delete\" onclick='return validate_delete()' href='function/database.php?q_id=$q_id&delete=true'>Delete</a><br>";
				echo "</div></div>";
	    	}
		}

		echo "<script src='js/script.js'></script>";
	}

	function show_query_answer($result) {
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$q_id = $row["question_id"];
				$a_id = $row["answer_id"];
	    		echo "<hr size='2' NOSHADE>";
				echo "<div class=\"question\">";
	    		echo "
	    		<span class=\"vote\"><img src=\"icon/arrow_up.png\" onclick = Update_Vote(1,0,".$a_id.") style=\"width: 80%; height: auto; margin-bottom: 5px;\"></img><div id=\"vote_answer".$a_id."\">".$row["vote"]."</div><img src=\"icon/arrow_down.png\" onclick = Update_Vote(0,0,".$a_id.") style=\"width: 80%; height: auto; margin-top: 5px;\"></img></span>
	    		<span id=\"question\">";
	    		if(isset($row["topic"])) echo "<p id=\"question-title\"><a href='question.php?q_id=$q_id'>".$row["topic"]."</a></p>";
	    		$content = $row["content"];
	    		echo "
	    			<p id=\"question-content\">$content</p>
	    		</span>
	    		<div class=\"identity\">
	    		<br>answered by: <span id=\"name\">".$row["name"]."</span> at ".$row["date_created"];
				echo "</div></div>";
	    	}
		}

		echo "<script src='js/script.js'></script>";
	}

	function show_question($conn, $result) {
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$q_id = $row["question_id"];
				$sql_answer = "SELECT count(answer_id) as count FROM `answer` WHERE question_id=".$q_id;
				$count_answer = mysqli_fetch_assoc(mysqli_query($conn,$sql_answer));
	    		echo "<hr size='2' NOSHADE>";
				echo "<div class=\"question\">";
	    		echo "
	    		<span class=\"vote\">".$row["vote"]."<br>votes</span>
	    		<span class=\"answer\">".$count_answer["count"]."<br>answer</span>
	    		<span id=\"question\">";
	    		if(isset($row["topic"])) echo "<p id=\"question-title\"><a href='question.php?q_id=$q_id'>".$row["topic"]."</a></p>";
	    		$content = $row["content"];
	    		if(strlen($content)>330) $content=substr($content, 0, 327)."...";
	    		echo "
	    			<p id=\"question-content\">$content</p>
	    		</span>
	    		<div class=\"identity\">
	    		<br>asked by: <span id=\"name\">".$row["name"]."</span> | <a id=\"edit\" href='form.php?q_id=$q_id&idx=2'>Edit</a> | <a id=\"delete\" onclick='return validate_delete()' href='function/database.php?q_id=$q_id&delete=true'>Delete</a><br>";
				echo "</div></div>";
	    	}
		}
		else echo "0 Results";

		echo "<script src='js/script.js'></script>";
	}


	if(isset($_GET["delete"])) {
		if($_GET["delete"]) {
			$conn = connect_database();
			$data["question_id"] = $_GET["q_id"];
			update_database(3,$conn,$data);
		}
	}
	
?>