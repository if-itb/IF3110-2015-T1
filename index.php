<!DOCTYPE html>
<html>
	<head>
		<title>Stack Exchange</title>
		<link rel="StyleSheet" href="style.css" type="text/css">
	</head>
	<body>
		<div class="container">
			<h1><a href="/stackExchange/index.php">Simple StackExchange</a></h1><br>
			<form name="SearchForm" action="Search.php" method="POST">
				<input type="text" name="keyword" id="inputtext2">
				<input type="submit" value="Search" id="search"><br>
			</form>
			<p style="text-align:center">Cannot find what you are looking for? <a href=AskQuestion.php style="color:orange">Ask here</a></p>
			<h3>Recently Asked Questions</h3>

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
					echo '<table style="table-layout: fixed">';
					while($row = mysqli_fetch_assoc($result)) {
						$linkshow = '<a href=/stackExchange/ShowQuestion.php?id='.$row["questionID"].'>'.$row["question_topic"]."</a>";
						$linkedit = '<a href=/stackExchange/EditQuestion.php?id='.$row["questionID"].' style="color:orange">edit</a>';
				    	$linkdelete = "<a href=/stackExchange/DeleteQuestion.php?id=".$row["questionID"]." style=\"color: red\" onclick=\"return confirm('Are you sure you want to delete this item?');\">delete</a>";
				    	$content = (strlen($row["content"]) > 150) ? substr($row["content"],0,150).'...' : $row["content"];

				    	echo
				    	'<tr style="border-top: 2px solid #000; height: 80px;">
				    		<td style="width:10%; text-align:center">'
				    			.$row["vote"].'<br>Votes
				    		</td>
				    		<td style="width:10%; text-align:center">'
				    			.$row["answers"].'<br>Answers
				    		</td>
				    		<td style="width:2%;">
				    		</td>
				    		<td style="vertical-align:top; padding-top:5px">'
				    			.$linkshow.'<br><br>'.$content.'<br>
				    			<p style="text-align:right">asked by <span style="color:blue">'.$row["name"].'</span> | '.$linkedit.' | '.$linkdelete.'</p>
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