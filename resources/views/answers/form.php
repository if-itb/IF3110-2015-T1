<form class='answer-form' action='/answers/create' method='POST'>
	<div class='form-header'>
		<h2>Your answer</h2>
	</div>
	<input type='hidden' name='question_id' value='<?= $question_id ?>'>
	<input class='form-input' type='text' name='name' placeholder='Name'>
	<input class='form-input' type='text' name='email' placeholder='Email'>
	<input class='form-input' type='text' name='topic' placeholder='Question Topic'>
	<textarea class='form-input' name='content' placeholder='Content' rows='8'></textarea>
	<button type='submit' onclick="return validateForm()">Post</button>
</form>
