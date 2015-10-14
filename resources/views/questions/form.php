<form class='question-form' action='/questions/create' method='POST'>
	<?php if (isset($question)): ?>
	<?php else: ?>
		<input class='form-input' type='text' name='name' placeholder='Name'>
		<input class='form-input' type='text' name='email' placeholder='Email'>
		<input class='form-input' type='text' name='topic' placeholder='Question Topic'>
		<textarea class='form-input' name='content' placeholder='Content' rows='8'></textarea>
		<button class='form-input' type='submit'>Post</button>
	<?php endif; ?>
</form>
