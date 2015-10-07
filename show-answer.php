<!DOCTYPE html>
<html lang = "en">
	<head>
		<link rel="stylesheet" type="text/css" href="answerStyle.css">
		<script type="text/javascript" src="vote.js"></script>
		<title>Simple Stack Exchange - Show Answer</title>
	</head>
	<body>
		<h1>Simple Stack Exchange</h1>
		<?php
			// Connect to database
			$con=mysqli_connect("localhost","root","","stackexchange");
			// Check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$id = $_GET["id"];
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM question where id_question = '$id'";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			// Show question
			echo "<h2>". $row["topic"]. "</h2>";
			echo "<hr>";
			echo "<table>";
			echo "<tr>";
			echo "<td class='number'>". "<a onclick='javascript:voteUp($row[id_question])'>". "&#x25B2". "</a>". "<br>". 
			"<a id='numvote'>". $row["num_vote"]. "</a>". "<br>". 
			"<a onclick='javascript:voteDown($row[id_question])'>". "&#x25BC". "</a>". "</td>";
			echo "<td class='content'>". $row["content"]. "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2' style=text-align:right;>". "asked by ". "<font color='purple'>".$row["username"]."</font>". 
			" at ". $row["created_date"]. " | ".
			"<a href='edit-question.html' style='text-decoration:none;'>". "<font color='orange'>"."edit"."</font>". "</a>". " | ".
			"<font color='red'>"."delete"."</font>". "</td>";
			echo "</tr>";
			echo "</table>";
			// Show answer
			echo "<h2>". "Answer". "</h2>";
			echo "<hr>";
		?>
		<form action="add-answer.php" method="post">
			<input placeholder="Name" type="text" name="name" class="text"><br><br>
			<input placeholder="Email" type="text" name="email" class="text"><br><br>
			<textarea placeholder="Content" type="text" name="content" rows="10"></textarea><br><br>
			<input type="submit" value="Post" class="button">
		</form>
	</body>
</html>