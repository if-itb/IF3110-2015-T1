<!DOCTYPE html>
<html>
<head>
<title>Simple StackExchange</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<a class="header" href="index.php">Simple StackExchange</a>
	<form action="search.php" method="get">
		<input type="search" name="search" id="search">
		<input type="submit" value="Search">
	</form>
	<p class="cannot">Cannot find what you are looking for?</p>
	<a class="ask" href="ask.html">Ask here</a>
	<p class="recent">Recently Asked Questions</p>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "database_of_questions";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}	

		$sql = "SELECT * FROM questions ORDER BY DateAndTime DESC";
		$result = mysqli_query($conn, $sql);
		$i = 0;
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$sql2 = "SELECT * FROM answers WHERE Question=".$row["Question_ID"];
				$answer = mysqli_query($conn, $sql2);
				echo '<hr class="garis" style="top:' . (230 + $i * 100) . 'px;">';
				echo '<p class="votes" style="top:' . (275 + $i * 100) . 'px;">Votes</p>';
				echo '<p class="answers" style="top:' . (275 + $i * 100) . 'px;">Answers</p>';
				echo '<p class="vote" style="top:' . (250 + $i * 100) . 'px;">'.$row["Votes"].'</p>';
				echo '<p class="answer" style="top:' . (250 + $i * 100) . 'px;">'.mysqli_num_rows($answer).'</p>';
				echo '<a onclick="return confirm(\'Are you sure want to delete this question?\')" href="delete.php?id=' . $row["Question_ID"] . '" class="delete" style="top:' . (305 + $i * 100) . 'px;">delete</a>';
				echo '<p class="batasi" style="top:' . (290 + $i * 100) . 'px;">|</p>';
				echo '<a class="edit" href="edit.php?id='.$row["Question_ID"].'" style="top:' . (305 + $i * 100) . 'px;">edit</a>';
				echo '<p class="batasii" style="top:' . (290 + $i * 100) . 'px;">|</p>';
				echo '<p class="askedby" style="top:' . (290 + $i * 100) . 'px;">asked by '. $row["Name"].'</p>';
				echo '<p class="name" style="top:' . (290 + $i * 100) . 'px;">'. $row["Name"].'</p>';
				echo '<a class="topic" href="question.php?id=' . $row["Question_ID"].'" style="top:' . (250 + $i * 100) . 'px;">'. $row["Topic"].'</a>';
				echo '<p class="content" style="top:' . (270 + $i * 100) . 'px;">'. $row["Content"].'</p>';
				$i = $i + 1;
			}
		}

		mysqli_close($conn);
	?>
	
</body>
</html>
