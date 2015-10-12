<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple StackExchange</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <?php
			ini_set('short_open_tag', 'on');

			$servername = "localhost";
			$username = "root";
			$password = "12345";
			$db = "stackexchange";

			// Create connection
			$conn = new mysqli($servername, $username, $password,$db);
			// Check connection
			if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
			}
		?>

	</head>
	<body>
		<div class="container">
			<a href="home.php"><h1>Simple StackExchange</h1></a>
			
			<div class="content">
				<form>
					<input type="text" class="input-search">
					<div class="button-right"><button type="submit">Search</button></div>
				</form>
			</div>

			<div class="content">
				<br><h5>Cannot find what you're looking for? <a class="edit" href="ask.php">Ask here</a></h5>
			</div>

			<div class="content"> <h3>Recently Asked Questions</h3> </div>
			
			<?php
			$listq = "SELECT id, name, email, topic, content, vote,
			(SELECT count(id_ans) FROM answer WHERE answer.id=question.id)as count_ans
			 FROM question";
			$result = $conn->query($listq);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
						$url="question.php?id=".$row["id"];
						$edit="edit.php?id=".$row["id"];
						$delete="delete.php?id=".$row["id"];
						echo
						"<div class=\"question-home\">
								<span id=\"vote\">". $row["vote"]."<br>Votes</span>
								<span id=\"answer\">". $row["count_ans"]."<br>Answers</span>
								<span id=\"question-content\">
									<a href=".$url."><p id=\"question-title\">".$row["topic"]."</p></a>
									<p id=\"question-description\">".substr($row["content"],0,165);
						if (strlen($row["content"])>165) echo "...";
						echo"</p>
								</span>
						</div>
						<div class=\"question-sign\">
							<p>asked by <font color=\"#008080\">".$row["name"]."</font> | <a class=\"edit\" href=".$edit.">edit</a> | 
							<a class=\"delete\" href=".$delete." onClick=\"return confirm('Are you sure you want to delete this question?')\">delete</a></p>
						</div>
						";

			    }
			} else {
			    echo "<div class=\"content\">Be the first to ask a question!</div>";
			}

			$conn->close();

			?>
			
		
		</div>
	</body>
</html>