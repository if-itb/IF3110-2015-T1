<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="function.js"></script>
		<title>Stack Exchange</title>
	</head>
	<body>
		<h1>Simple StackExchange</h1><br>
		<form name='searchForm' action='search.php' method='post'>
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
		$sql = "SELECT question_id, asker_name, question_topic, question_content, question_vote FROM question";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			// output data
			while($row = mysqli_fetch_assoc($result)) {
				// Get answers count
				$sql = "Select count(answer_id) As count From answer Where question_id =".$row["question_id"];
				$count = mysqli_fetch_assoc(mysqli_query($conn, $sql));
				echo "<div class='list'>";
				echo "<div class='vote'>".$row["question_vote"]."<br>Votes</div>";
				echo "<div class='answer_count'>".$count["count"]."<br>Answers</div>";
				if(strlen($row["question_content"]) >150) {
					echo "<div class='question'><a class='question_topic' href='detail.php?id=".$row["question_id"]."'>".$row["question_topic"]."</a><br><br>"
					.substr($row["question_content"],0,149).".....</div>";
				} else {
					echo "<div class='question'><a class='question_topic' href='detail.php?id=".$row["question_id"]."'>".$row["question_topic"]."</a><br><br>".$row["question_content"]."</div>";
				}
				echo "<div class='asked_by'>asked by <span class='name'>".$row["asker_name"]."</span> | 
				<a href='question.php?id=".$row["question_id"]."' class='edit'>edit</a> | 
				<a onclick='return confirmDelete()' href='delete.php?id=".$row["question_id"]."' class='delete'>delete</a></div>";
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




