<?php
	$conn = mysqli_connect("localhost", "root", "", "question_answer");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$ID = $_GET['id'];
	$sql = "SELECT Q_id, Q_Vote, Q_Topic, Q_Content, Q_Email FROM question WHERE Q_id= $ID";
	$question = mysqli_query($conn, $sql);
	$sql2 = "SELECT A_id, A_Vote, A_Content, A_Email FROM answer WHERE Q_id= $ID";
	$answer = mysqli_query($conn, $sql2);
	
	if(isset($_POST['answer'])){
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Content = $_POST['Content'];
		
		$sql3 = "INSERT INTO answer (A_Name, A_Email, A_Content, Q_id) VALUES ('$Name', '$Email', '$Content', '$ID')";
		$result = mysqli_query($conn, $sql3);
		
		if(!$result){
			die("Invalid query: ".mysqli_error());
		}
		else{
			header("Location: Answer.php?id=$ID");
		}
	} 
	echo "<script type=\"text/javascript\" src=\"Vote.js\"></script>";
	if (mysqli_num_rows($question) > 0) {
		while($row = mysqli_fetch_assoc($question)) {
			echo "<h2 class=\"align\">
				<div>".
					$row["Q_Topic"].
				"</div>
				<div>
					<hr>
				</div>
			</h2>
			<div class=\"answer_question\">
				<div class=\"vote\">
					<div class=\"number\">
						<span id=QU".$row["Q_id"]." name=\"vote\" onclick=\"getVote(this.id)\">&#x25B2</span>
					</div>
					<br>
					<div class=\"number\" id=\"Q".$row["Q_id"]."\">".
						$row["Q_Vote"].
					"</div>
					<br>
					<div class=\"number\">
						<span id=\"QD".$row["Q_id"]."\" name=\"vote\" onclick=\"getVote(this.id)\">&#x25BC</span>
					</div>		
				</div>
				<div class=\"answer_topic\">".
					$row["Q_Content"].
				"</div>
			
				<div class=\"asked_email\">
					asked by " . $row["Q_Email"] ." | <a href=\"Edit.php?id=".$row["Q_id"]."\" class=\"color_yellow\">edit<a> | <a href=\"Delete.php?id=".$row["Q_id"]."\" class=\"delete\">delete<a>
				</div>
			</div>";
		}
		echo "<h2 class=\"align\">
				<div>".
					mysqli_num_rows($answer)." Answers
				</div>
				<div>
					<hr>
				</div>
			</h2>";
	}		
	if(mysqli_num_rows($answer) > 0) {
		while($row = mysqli_fetch_assoc($answer)) {
			echo"<div class=\"answers\">
					<div class=\"vote\">
						<div class=\"number\">
							<span id=\"AU".$row["A_id"]."\" name=\"vote\" onclick=\"getVote(this.id)\">&#x25B2</span>
						</div>
						<br>
						<div class=\"number\" id=\"A".$row["A_id"]."\">".
							$row["A_Vote"].
						"</div>
						<br>
						<div class=\"number\">
							<span id=\"AD".$row["A_id"]."\" name=\"vote\" onclick=\"getVote(this.id)\">&#x25BC</span>
						</div>	
					</div>
					<div class=\"answer_topic\">".
						$row["A_Content"].
					"</div>
				
					<div class=\"asked_email\">
						answered by " . $row["A_Email"] .
					"</div>
					
				</div>
				<hr class=\"Margin\">";
		}
	}
	
	echo "<h3 class=\"align\"> Your Answer </h3>
		<script type=\"text/javascript\" src=\"Validasi.js\"></script>;
		<form class=\"align\" name=\"answer\" action=\"Answer.php?id=" .$ID. "\" method=\"post\" onsubmit=\"return validateA()\">
			<div class=\"kotakform\">
				<input type=\"text\" name=\"Name\" class=\"form_question\" placeholder=\"Name\">
			</div>
			<div class=\"kotakform\">
				<input type=\"text\" name=\"Email\" class=\"form_question\" placeholder=\"Email\">
			</div>
			<div class=\"kotakform\">
				<textarea name=\"Content\" class=\"form_content\" placeholder=\"Content\"></textarea>
			</div>
			<div class=\"form_post\">
				<input type=\"submit\" name=\"answer\" value=\"Post\">
			</div>
		</form>";
	
	mysqli_close($conn);
?>