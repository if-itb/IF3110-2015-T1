<form class='question-form' action='/questions/edit' method='POST'>
	<input type='hidden' name='question_id' value='<?= $question->id ?>'>
	<input class='form-input' type='text' name='name' placeholder='Name' value='<?= $question->name ?>'>
	<input class='form-input' type='text' name='email' placeholder='Email' value='<?= $question->email ?>'>
	<input class='form-input' type='text' name='topic' placeholder='Question Topic' value='<?= $question->topic ?>'>
	<textarea class='form-input' name='content' placeholder='Content' rows='8'><?= $question->content ?></textarea>
	<button class='form-input' type='submit'>Post</button>
</form>
