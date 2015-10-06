<h2>What's your question?</h2>
<hr>
<div class="center">
	<form action="" method="POST">
		<?php
			if (!isset($question)){
				echo "<input class='ask-item' type='text' name='name' placeholder='Name'>";
				echo "<input class='ask-item' type='text' name='email' placeholder='Email'>";
				echo "<input class='ask-item' type='text' name='topic' placeholder='Question Topic'>";
				echo "<textarea class='ask-item' rows='12' name='question' placeholder='Content'></textarea>";
			} else{
				echo "<input class='ask-item' type='text' name='name' placeholder='Name' value=" . $question['name'] . ">";
				echo "<input class='ask-item' type='text' name='email' placeholder='Email' value=" . $question['email'] . ">";
				echo "<input class='ask-item' type='text' name='topic' placeholder='Question Topic' value=" . $question['topic'] . ">";
				echo "<textarea class='ask-item' rows='12' name='question' placeholder='Content'>" . $question['question'] . "</textarea>";
			}
		?>
		<div class="ask-button right">
			<input type="submit" value="Post">
		</div>
	</form>
</div>
