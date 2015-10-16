<h1>
	Edit your question
</h1>
<form class='form' method='post' action='?controller=questions&action=update&qid=<?php echo $question->qid ?>' >
	<input type='text' name='authorname' placeholder="Name"  value='<?php echo $question->authorname?>'/>
	<input type='text' name='authoremail' placeholder="Email" value='<?php echo $question->authoremail ?>'/>
	<input type='text' name='topic' placeholder="Question topic" value='<?php echo $question->topic ?>'/>
	<textarea name="content" rows="7" cols="30" placeholder="Content"><?php echo $question->content?></textarea>
	<input type='submit' value='Post'/>
</form>