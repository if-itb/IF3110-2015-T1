<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "question_answer";

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	$db = mysql_select_db($dbname, $conn);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$ID = $_GET['id'];
	$sql = "SELECT Q_id, Q_Name, Q_Email, Q_Topic, Q_Content FROM question WHERE Q_id=$ID";
	$question = mysql_query($sql, $conn);
	while($row = mysql_fetch_assoc($question)) {
		echo "<!DOCTYPE html>
			<html>
			<head>
			<title>Edit Question</title>
			<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">
			<script type=\"text/javascript\" src=\"Validasi.js\"></script>
			</head>
			<body>

			<a href=\"index.php\" class=\"black\"><h1 class=\"title\">Simple StackExchange</h1></a>

			<h2 class=\"align\">
				<div>
					What's your question?
				</div>
				<div>
					<hr>
				</div>
			</h2>

			<form class=\"align\" action=\"Ask.php\" method=\"post\" name=\"question\" onsubmit=\"return validateForm()\">
				<div class=\"kotakform\">
					<input type=\"text\" name=\"Name\" class=\"form_question\" placeholder=\"Name\" value=\"".$row["Q_Name"]."\">
				</div>
				<div class=\"kotakform\">
					<input type=\"text\" name=\"Email\" class=\"form_question\" placeholder=\"Email\" value=\"".$row["Q_Email"]."\">
				</div>
				<div class=\"kotakform\">
					<input type=\"text\" name=\"Topic\" class=\"form_question\" placeholder=\"Question Topic\" value=\"".$row["Q_Topic"]."\">
				</div>
				<div class=\"kotakform\">
					<textarea name=\"Content\" class=\"form_content\" placeholder=\"Content\" >".$row["Q_Content"]. "</textarea>
				</div>
				<input type=\"hidden\" name=\"id\"  value=\"".$row["Q_id"]."\">
				<div class=\"form_post\">
					<input type=\"submit\" name=\"edit\" value=\"Post\">
				</div>
			</form>

			</body>
			</html>";
	}
	mysql_close($conn);
?>