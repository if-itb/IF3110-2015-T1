<!DOCTYPE html>
<html>
	<head>
		<title>Stack Exchange</title>
		<link rel="StyleSheet" href="style.css" type="text/css">
		<script src="Functions.js"></script>
	</head>
	<body>

		<?php
			$servername = "localhost";
			$username = "root";
			$password = "dininta";
			$dbname = "stackexchange";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			// Get data from database
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$id = $_GET["id"];
				$sql = "SELECT * FROM question WHERE questionID=$id";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$name = $row["name"];
				$email = $row["email"];
				$topic = $row["question_topic"];
				$content = $row["content"];
				$vote = $row["vote"];
				$answers = $row["answers"];
				$date = $row["date"];
			}

			// Close connection
			mysqli_close($conn);
		?>

		<div class="container">
			<h1><a href="/stackExchange/index.php">Simple StackExchange</a></h1><br>
			<h2><?php echo $topic ?></h2><br>
			<table>
				<tr>
					<td style="width:15%; text-align:center">
						<img src="up.png"><br>
				    	<p style="font-size:40px; margin:0; color:lightgrey"> <?php echo $vote ?> </p>
						<img src="down.png">
				    </td>
				    <td style="vertical-align:top">
				    	<?php echo $content ?><br>
				    </td>
				</tr>
			</table>
			<p style="text-align:right">asked by <?php echo $email ?> at <?php echo $date ?> | <a href=/stackExchange/EditQuestion.php?id=<?php echo $id ?> style="color: orange; text-decoration:none">edit</a> | <a href=/stackExchange/DeleteQuestion.php?id=<?php echo $id ?> style="color: red; text-decoration:none" onclick="return confirm('Are you sure you want to delete this item?');">delete</a></p>
			<h2><?php echo $answers ?> Answer</h2><br>

			<?php
				$servername = "localhost";
				$username = "root";
				$password = "dininta";
				$dbname = "stackexchange";

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Display all answers
				$sql = "SELECT * FROM answer where questionID='$id'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					echo '<table>';
					while($row = mysqli_fetch_assoc($result)) {
						echo
				    	'<tr style="border-bottom:2px solid #000">
				    		<td style="width:15%; text-align:center; padding:20px">
				    			<img src="up.png"><br>
				    			<p style="font-size:40px; margin:0; color:lightgrey">' .$row["vote"]. '</p>
								<img src="down.png">
				    		</td>
				    		<td style="vertical-align:top; padding:20px">'
				    			.$row["content"].'<br>
				    			<p style="text-align:right">answered by '.$row["email"].' at '.$row["date"].'</p>
				    		</td>
				    	</tr>';
			    	}
			    	echo "</table>";
				}

				// Close connection
				mysqli_close($conn);
			?>

			<br><p style="font-size:30px; margin:0; color:grey"> Your Answer </p>
			<form name="AnswerForm" action="AddAnswer.php" onsubmit="return validateAnswerForm()" method="POST">
				<input type="text" name="name" id="inputtext1" placeholder="Name"><br>
				<input type="text" name="email" id="inputtext1" placeholder="Email"><br>
				<textarea name="content" id="content" placeholder="Content"></textarea><br><br>
				<input type="hidden" name="questionID" value="<?php echo $id; ?>" />
				<input type="submit" value="Post">
			</form>
		</div>
		
	</body>
</html>