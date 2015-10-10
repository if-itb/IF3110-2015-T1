<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="validation.js"></script>
		<title>Stack Exchange</title>
	</head>
	
	<?php
	include 'header.php';
	$conn = connectToDatabase();
	?>
	
	<body>
		<h1>Simple StackExchange</h1>
		<br>
		
		<?php
		$id = $_GET["id"];
		$sql = "Select question_topic, question_content From question Where question_id=".$id;
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		echo "<h2 class='header'>".$row["question_topic"]."</h2>";
		echo "<p>".$row["question_content"]."</p>";
		?>
		
		<?php
		$sql = "Select count(answer_id) As hitung From answer Where question_id = ".$id;
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$count = $row["hitung"];
		
		echo "<h2 class='header'>".$count." Answers</h2>";
		
		$sql = "Select answerer_name, answer_content, answer_vote From answer Where question_id=".$id;
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			// output data
			while($row = mysqli_fetch_assoc($result)) {
				echo "<div class='question_box'>";
				echo "<div class = 'vote_box'>";
				echo "<img class='voteImage' src='img/up.png'></img>";
				echo "<div id='voteNumber'>".$row["answer_vote"]."</div>";
				echo "<img class='voteImage' src='img/down.png'></img>";
				echo "</div>";
				echo "<div class='question_detail'>".$row["answer_content"];
				echo "</div>";
				echo "<div class='asked_by_detail'>asked by <span class='name'>".$row["answerer_name"]."</span> | <a href = '#' class='edit'>edit</a> | <a href = '#' class='delete'>delete</a></div>";
				echo "</div>";
			}
		} else {
			echo "<p>No answer available, be the first to answer this question</p>";
		}
		
		?>
		
		<?php
		include 'footer.php';
		closeDatabase($conn);
		?>
		
		<p>Your Answer</p>
		<form name="answerForm" onsubmit="return validateAnswerForm()" action="post_answer.php?id=<?php echo $id; ?>" method="post">
			<div id = "name_box">
				<input type="text" name="answerer_name" placeholder="Name"><br>
				<input type="text" name="answerer_email" placeholder="Email"><br>
			</div>
			<div>
				<textarea name="content" placeholder="Content"></textarea><br><br>
			</div>
			<div id = "post_button">
				<input type="submit" value="Post">
			</div>
		</form>
		
	</body>
	
</html>
