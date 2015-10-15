<form id='questionform' method='post' action='?controller=questions&action=update&qid=<?php echo $question->qid ?>' >
	<p>
		Name						: <input type='text' name='authorname' value='<?php echo $question->authorname?>'/>
	</p>
	<p>
		Email						: <input type='text' name='authoremail' value='<?php echo $question->authoremail ?>'/>
	</p>
	<p>
		Question topic	: <input type='text' name='topic' value='<?php echo $question->topic ?>'/>
	</p>

	<p>
		Question:<br/>
	 <textarea name="content" rows="7" cols="30"><?php echo $question->content?></textarea>
	</p>
	 <p>
	 <input type='submit' value='UPDATE'/>
	 </p>
</form>