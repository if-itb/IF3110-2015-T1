<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<title>Stack Exchange</title>
	</head>
	<body>
		<h1>Simple StackExchange</h1><br>
		<form>
			<div id="search_box">
				<input type="text" name="search" placeholder="Search">
				<input type="submit" name="search_button" value="Search">
			</div>
		</form>
		<p class="ask">Cannot find what you are looking for? <a class="ask" href="question.php">Ask here</a></p>
		<br>
		<p>Recently Asked Question</p>
		
		<?php
		include 'header.php';
		$conn = connectToDatabase();
		?>
		
		<?php
		// Get all data
		$sql = "SELECT asker_name, question_topic, question_vote FROM question";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			// output data
			while($row = mysqli_fetch_assoc($result)) {
				echo "<div class='list'>";
				echo "<div class='vote'>".$row["question_vote"]."<br>Votes</div>";
				echo "<div class='answer_count'>0<br>Answers</div>";
				echo "<div class='question_topic'>".$row["question_topic"]."</div>";
				echo "<div class='asked_by'>asked by ".$row["asker_name"]." | edit | delete</div>";
				echo "</div>";
			}
		} else {
			echo "<p>No Question available, be the first person to ask a question</p>";
		}
		?>
		
		<?php
		include 'footer.php';
		closeDatabase($conn);
		?>
		
	</body>
</html>




