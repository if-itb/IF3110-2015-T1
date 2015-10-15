<form id='answerform' method='post' action='?controller=answers&action=insert&qid=<?php echo $_GET['qid'] ?>'>
	<p>
		Name						: <input type='text' name='authorname' />
	</p>
	<p>
		Email						: <input type='text' name='authoremail' />
	</p>

	<p>
		Answer:<br/>
	 <textarea name="content" rows="7" cols="30"></textarea>
	</p>
	 <p>
	 <input type='submit'/>
	 </p>
</form>