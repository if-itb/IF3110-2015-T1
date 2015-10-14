<?php
	echo "<h2>" . $question['topic'] . "</h2>";
?>

<hr>
<div>
	<?php
		echo "<table class='stats'>
		<tr>
			<td><div onclick=\"voteQuestion('upvote')\" class='arrow-up'></div></td>
		</tr>
		<tr class='stat-number'>
			<td id='question_vote'>" . $question['vote'] . "</td>
		</tr>
		<tr>
			<td><div onclick=\"voteQuestion('downvote')\" class='arrow-down'></div></td>
		</tr>
	</table>\n<br>\n";
	?>
	<p class='question-detail'> <?php echo $question['question'];?> </p>
	<p class='right'><b>asked by <span class='purple'><?php echo $question['email']; ?></span> at <?php echo $question['datetime'];?> | <a href='ask-question.php?id=<?php echo $question['id']; ?>' class='orange'>edit</a> | <a <a href='delete-question.php?id=<?php echo $question['id']; ?>' class='red' onclick='return confirmDelete()'>delete</a></b></p>
</div>

<?php
	
	$ans_count = count($answers);
	echo "<h2>" . $ans_count . " Answers </h2>";
	echo "<hr>";
	if ($ans_count){
		foreach ($answers as $answer) {
			echo "\t\t<table class='stats'>
			<tr>
				<td><div onclick=\"voteAnswer('upvote', " . $answer['id'] . ")\" class='arrow-up'></div></td>
			</tr>
			<tr class='stat-number'>
				<td id='" . $answer['id'] . "'>" . $answer['vote'] . "</td>
			</tr>
			<tr>
				<td><div onclick=\"voteAnswer('downvote', " . $answer['id'] . ")\" class='arrow-down'></div></td>
			</tr>
		</table>\n<br>\n";
			echo "<p class='question-detail'>" . $answer['answer'] . "</p>";
			echo "\t<p class='right'><b>answered by <a class='purple'>" . $answer['email'] . "</a> at " . $answer['datetime'] . "</b></p>";
			echo "<br><hr>";
		}
	}
?>

<h2>Your Answer</h2>
<div class="ask-content center">
	<form action="" method="POST" name="answer_form" onsubmit="return validateAnswerForm()">
		<input class='rectangle ask-item' type='text' name='name' placeholder='Name'>
		<input class='ask-item rectangle' type='text' name='email' placeholder='Email'>
		<textarea class='ask-item rectangle' rows='12' name='answer' placeholder='Content'></textarea>
		<input type='hidden' name='id' value='<?php	echo $question['id'];?>'>
		<div class="ask-button right">
			<input class="rectangle" type="submit" value="Post">
		</div>
	</form>
</div>
