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
				$ID = $row['Q_id'];
				$sql2 = "SElECT Q_id FROM answer WHERE Q_id=$ID";
				$answer = mysqli_query($conn,$sql2);
				if(strlen($row["Q_Content"])>60){
					$bag = substr($row["Q_Content"],0,59)."...";
				} else {
					$bag = $row["Q_Content"];
				}
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
							<div class=\"number\">".
								mysqli_num_rows($answer)
							."</div>
							<div>
								Answers
							</div>		
						</div>
					
						<div class=\"topic\">
							<a href=\"Answer.php?id=".$row["Q_id"]."\" class=\"topic_link\">".
							$row["Q_Topic"].						
						"</a>
						<br>".
							$bag
						."</div>
					
						<div class=\"asked\">
							asked by <span class=\"name\">" . $row["Q_Name"] ."</span> | <a href=\"Edit.php?id=".$row["Q_id"]."\"class=\"color_yellow\">edit<a> | <a onclick=\"return confirm_delete()\" href=\"Delete.php?id=".$row["Q_id"]."\"class=\"delete\">delete<a>
						</div>
				</div>";
			}
		}
	}
?>