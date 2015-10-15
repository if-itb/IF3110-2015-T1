<!DOCTYPE html>
<html>
	<head>
		<title>Stack Exchange</title>
		<link rel="StyleSheet" href="style.css" type="text/css">
		<script src="Functions.js"></script>
	</head>
	<body>
		<div class="container">
			<h1><a href="/stackExchange/index.php">Simple StackExchange</a></h1><br>
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

				// Search from database
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$keyword = $_POST["keyword"];
					$sql = "SELECT * FROM question WHERE  question_topic LIKE '%".$keyword."%' OR content LIKE '%".$keyword ."%'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						echo '<table style="table-layout: fixed">';
						while($row = mysqli_fetch_assoc($result)) {
							$linkshow = '<a href=/stackExchange/ShowQuestion.php?id='.$row["questionID"].'>'.$row["question_topic"]."</a>";
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
							    	<p style="text-align:right">asked by '.$row["email"].'</p>
							    </td>
							</tr>';
						}
						echo "</table>";
					}
				}

				// Close connection
				mysqli_close($conn);
			?>
		</div>
	</body>
</html>