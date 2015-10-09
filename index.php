<!DOCTYPE html>
<html>
	<head>
		<title>Stack Exchange</title>
		<link rel="StyleSheet" href="style.css" type="text/css">
	</head>
	<body>
		<div class="container">
			<h1>Simple StackExchange</h1><br>
			<input type="text" name="keyword" id="inputtext2">
			<input type="submit" value="Search" id="search"><br>
			<p style="text-align:center">Cannot find what you are looking for? <a href=AskQuestion.php style="text-decoration:none">Ask here</a></p>
			<h3 style="margin-bottom:0">Recently Asked Questions</h3>

			<?php
				$servername = "localhost";
				$username = "root";
				$password = "dininta";
				$dbname = "stackexchange";

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Display all questions
				$sql = "SELECT * FROM question";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					echo "<table>";
					while($row = mysqli_fetch_assoc($result)) {
				    	echo
				    	'<tr>
				    		<td style="width:10%; text-align:center">'
				    			.$row["vote"].'<br>Votes
				    		</td>
				    		<td style="width:10%; text-align:center">'
				    			.$row["answers"].'<br>Answers
				    		</td>
				    		<td style="vertical-align:top">'
				    			.$row["question_topic"].'<br>'.$row["content"].'<br>
				    			<p style="text-align:right">asked by '.$row["email"].'|edit|delete</p>
				    		</td>
				    	</tr>';
			    	}
			    	echo "</table>";
				}

				// Close connection
				mysqli_close($conn);
			?>

		</div>
	</body>
</html>