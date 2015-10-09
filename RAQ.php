<?php
	function RAQ(){
		$conn = mysqli_connect("localhost", "root", "", "question_answer");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT Q_Name, Q_Vote, Q_Topic, Q_Content, Q_id FROM question";
		$question = mysqli_query($conn, $sql);
		if (mysqli_num_rows($question) > 0) {
			while($row = mysqli_fetch_assoc($question)) {
				echo "<div class=\"RAQ\">
					<hr>
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
						"<br>".
							$row["Q_Content"].
						"</div>
					
						<div class=\"asked\">
							asked by " . $row["Q_Name"] ." | <a href=\"Edit.php?id=".$row["Q_id"]."\">edit<a> | <a href=\"Delete.php?id=".$row["Q_id"]."\">delete<a>
						</div>
				</div>";
			}
		}
	}
?>