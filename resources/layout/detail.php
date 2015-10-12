<?php
	echo "<h2>" . $question['topic'] . "</h2>";
?>

<hr>
<div>
	<?php
		echo "<p class='question-detail'>" . $question['question'] . "</p>";
		echo "\t<p class='right'><b>asked by <a class='purple'>" . $question['name'] . "</a> | <a href='ask-question.php?id=" . $question[id] . "' class='orange'>edit</a> | <a href='delete-question' class='red'>delete</a></b></p>";
	?>		
</div>

<?php
	
	$ans_count = count($answers);
	echo "<h2>" . $ans_count . " Answers </h2>";
	echo "<hr>";
	if ($ans_count){
		foreach ($answers as $answer) {
			echo "<p class='question-detail'>" . $answer['answer'] . "</p>";
			echo "\t<p class='right'><b>answered by <a class='purple'>" . $answer['name'] . "</a> at sekarang";
			echo "<br><hr>";
		}
	}
?>

<h2>Your Answer</h2>
<div class="ask-content">
	<input class='ask-item' type='text' name='name' placeholder='Name'>
	<input class='ask-item' type='text' name='email' placeholder='Email'>
	<input class='ask-item' type='text' name='topic' placeholder='Question Topic'>
	<textarea class='ask-item' rows='12' name='question' placeholder='Content'></textarea>
</div>