<!DOCTYPE html>
<html>
<head>
<title>Simple StackExchange</title>
<link rel="stylesheet" type="text/css" href="ask.css">
</head>
<body>
	<a href="index.php">Simple StackExchange</a>
	<p class="what">What's your question?</p>
	<hr>
	<form action="update.php" method="get" id="Question">
		<input type="text" name="Name" id="Name" onfocus="focusName()" onblur="blurName()" style="color: #000000;">
		<input type="text" name="Email" id="Email" onfocus="focusEmail()" onblur="blurEmail()" style="color: #000000;">
		<input type="text" name="Topic" id="Topic" onfocus="focusTopic()" onblur="blurTopic()" style="color: #000000;">
		<input type="submit" value="Edit">
		<input type="text" name="QID" id="QID" hidden>
	</form>
	<textarea form ="Question" name="Content" id="Content" onfocus="focusContent()" onblur="blurContent()" rows="12" wrap="soft" style="color: #000000;"></textarea>
	<script src="questionform.js"></script>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "database_of_questions";
		
		$qid = $_GET["id"];
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$sqlid = "SELECT * FROM questions WHERE Question_ID =".$qid;
		$sid = $conn->query($sqlid);
		
		while($row = mysqli_fetch_assoc($sid)){
			echo '<script>document.getElementById("Name").value = "'.$row["Name"].'";';
			echo 'document.getElementById("Email").value = "'.$row["Email"].'";';
			echo 'document.getElementById("Topic").value = "'.$row["Topic"].'";';
			echo 'document.getElementById("Content").value = "'.$row["Content"].'";';
			echo 'document.getElementById("QID").value = "'.$qid.'";';
			echo 'Name = 1; Email = 1; Topic = 1; Content = 1;</script>';
			$Name = $row["Name"];
			$Email = $row["Email"];
			$Topic = $row["Topic"];
			$Content = $row["Content"];
		}
		mysqli_close($conn);
	?>
</body>
</html>

