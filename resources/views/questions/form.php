<form class='question-form' action='/questions/create' method='POST'>
	<input class='form-input' type='text' name='name' placeholder='Name' required>
	<input class='form-input' type='text' name='email' placeholder='Email' required>
	<input class='form-input' type='text' name='topic' placeholder='Question Topic' required>
	<textarea class='form-input' name='content' placeholder='Content' rows='8' required></textarea>
	<button class='form-input' type='submit'>Post</button>
</form>
