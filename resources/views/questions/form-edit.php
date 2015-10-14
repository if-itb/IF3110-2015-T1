<form class='question-form' action='/questions/edit' method='POST'>
	<input type='hidden' name='question_id' value='<?= $question->id ?>'>
	<input class='form-input' type='text' name='name' placeholder='Name' value='<?= $question->name ?>' required>
	<input class='form-input' type='text' name='email' placeholder='Email' value='<?= $question->email ?>' required>
	<input class='form-input' type='text' name='topic' placeholder='Question Topic' value='<?= $question->topic ?>' required>
	<textarea class='form-input' name='content' placeholder='Content' rows='8' required><?= $question->content ?></textarea>
	<button class='form-input' type='submit'>Post</button>
</form>
