<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="validation.js"></script>
		<script type="text/javascript" src="function.js"></script>
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
		$sql = "Select question_id, question_topic, asker_email, question_content, question_vote From question Where question_id=".$id;
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		echo "<h2 class='header'>".$row["question_topic"]."</h2>";
		
		echo "<div class='question_box'>";
		echo "<div class = 'vote_box'>";
		echo "<img class='voteImage' src='img/up.png' onclick='incrementQuestionVote(".$row["question_id"].")'></img>";
		echo "<div class='voteNumber' id='questionVote'>".$row["question_vote"]."</div>";
		echo "<img class='voteImage' src='img/down.png' onclick='decrementQuestionVote(".$row["question_id"].")'></img>";
		echo "</div>";
		echo "<div class='question_detail'>".$row["question_content"];
		echo "</div>";
		echo "<div class='asked_by_detail'>asked by ".$row["asker_email"]." | <a href='question.php?id=".$row["question_id"]."' class='edit'>edit</a> | 
		<a onclick='return confirmDelete()' href='delete.php?id=".$row["question_id"]."' class='delete'>delete</a></div>";
		echo "</div>";
		
		?>
		
		<?php
		$sql = "Select count(answer_id) As hitung From answer Where question_id = ".$id;
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$count = $row["hitung"];
		
		echo "<h2 class='header'>".$count." Answers</h2>";
		
		$sql = "Select answer_id, answerer_email, answer_content, answer_vote From answer Where question_id=".$id;
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			// output data
			while($row = mysqli_fetch_assoc($result)) {
				echo "<div class='answer_box'>";
				echo "<div class = 'vote_box'>";
				echo "<img class='voteImage' src='img/up.png' onclick='incrementAnswerVote(".$row["answer_id"].")'></img>";
				echo "<div class='voteNumber' id='answerVote".$row["answer_id"]."'>".$row["answer_vote"]."</div>";
				echo "<img class='voteImage' src='img/down.png' onclick='decrementAnswerVote(".$row["answer_id"].")'></img>";
				echo "</div>";
				echo "<div class='question_detail'>".$row["answer_content"];
				echo "</div>";
				echo "<div class='asked_by_detail'>answered by ".$row["answerer_email"]."</div>";
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
