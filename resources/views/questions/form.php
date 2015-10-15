<form class='question-form' action='/questions/create' method='POST'>
	<input class='form-input' type='text' name='name' placeholder='Name'>
	<input class='form-input' type='text' name='email' placeholder='Email'>
	<input class='form-input' type='text' name='topic' placeholder='Question Topic'>
	<textarea class='form-input' name='content' placeholder='Content' rows='8'></textarea>
	<button type='submit' onclick="return validateForm()">Post</button>
</form>
