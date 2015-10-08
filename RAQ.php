<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "question_answer";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	function RAQ(){
		$conn = mysqli_connect("127.0.0.1", "root", "", "question_answer");
		$sql = "SELECT Q_Name, Q_Vote, Q_Topic FROM question";
		$question = mysqli_query($conn, $sql);
		if (mysqli_num_rows($question) > 0) {
			while($row = mysqli_fetch_assoc($question)) {
				echo "<div class=\"RAQ\">
					<div class=\"vote\">
						<div class=\"number\">".
							$row["Q_Vote"].
						"</div>	
						<div>
							Votes
						</div>
					</div>
			
					<div class=\"answer\">
						<div class=\"number\">
							0
						</div>
						<div>
							Answers
						</div>		
					</div>
				
					<div class=\"topic\">".
						$row["Q_Topic"].
					"</div>
				
					<div class=\"asked\">
						asked by" . $row["Name"] ."| <a href=\"#\">edit<a> | <a href=\"#\">delete<a>
					</div>
				</div>";
			}
		}
	}
?>