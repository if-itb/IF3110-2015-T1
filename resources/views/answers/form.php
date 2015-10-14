<form class='answer-form' action='/answers/create' method='POST'>
	<div class='form-header'>
		<h2>Your answer</h2>
	</div>
	<input type='hidden' name='question_id' value='<?= $question_id ?>' required>
	<input class='form-input' type='text' name='name' placeholder='Name' required>
	<input class='form-input' type='text' name='topic' placeholder='Question Topic' required>
	<textarea class='form-input' name='content' placeholder='Content' rows='8' required></textarea>
	<button class='form-input' type='submit'>Post</button>
</form>
