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
			echo "<td class='number'>". "<a class='vote' onclick='javascript:voteUpQuestion($row[id_question])'>". "&#x25B2". "</a>". "<br>". 
			"<a id='numvote_q'>". $row["num_vote"]. "</a>". "<br>". 
			"<a class='vote' onclick='javascript:voteDownQuestion($row[id_question])'>". "&#x25BC". "</a>". "</td>";
			echo "<td class='content'>". $row["content"]. "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2' class='attribute' style=text-align:right;>". "asked by ". "<font color='purple'>".$row["username"]."</font>". 
			" at ". $row["created_date"]. " | ".
			'<a href="edit-question.php?id='. $row["id_question"]. '" style="text-decoration:none;">'. "<font color='orange'>"."edit"."</font>". "</a>". " | ".
			"<font color='red'>"."delete"."</font>". "</td>";
			echo "</tr>";
			echo "</table>";

			// Show answer
			$sql = "SELECT count(*) AS total FROM answer where id_question = '$id'";
			$result = $con->query($sql);
			$values = $result->fetch_assoc();
			$num_rows = $values['total']; 
			echo "<h2>". $num_rows. " Answer". "</h2>";
			echo "<hr>";
			$sql = "SELECT * FROM answer where id_question = '$id'";
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<table>";
					echo "<tr>";
					echo "<td class='number'>". "<a class='vote' onclick='javascript:voteUpAnswer($row[id_answer])'>". "&#x25B2". "</a>". "<br>". 
					'<a id="numvote_a_'. $row["id_answer"]. '">'.  $row["num_vote"]. "</a>". "<br>". 
					"<a class='vote' onclick='javascript:voteDownAnswer($row[id_answer])'>". "&#x25BC". "</a>". "</td>";
					echo "<td class='content'>". $row["content"]. "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='2' class='attribute' style=text-align:right;>". "answered by ". "<font color='purple'>".$row["username"]."</font>". 
					" at ". $row["ans_date"]. "</td>";
					echo "</tr>";
					echo "</table>";
					echo "<hr>";
        		}
			}
			echo "<h3>". "Your Answer". "</h3>";
			echo '<form action="add-answer.php" method="post">';
			echo '<input type="hidden" class="text" name="id" value='. $id. ">";
			echo '<input placeholder="Name" type="text" name="name" class="text">'. "<br>". "<br>";
			echo '<input placeholder="Email" type="text" name="email" class="text">'. "<br>". "<br>";
			echo '<textarea placeholder="Content" type="text" name="content" rows="10">'. "</textarea>". "<br>". "<br>";
			echo '<input type="submit" value="Post" class="button">';
			echo "</form>";
		?>
		
	</body>
</html>