<h2>
	Your Answer
</h2>
<form class='form' method='post' action='?controller=answers&action=insert&qid=<?php echo $_GET['qid'] ?>'>
	<input type='text' name='authorname' placeholder="Name"/>
	<input type='text' name='authoremail' placeholder="Email"/>
	<textarea name="content" rows="7" cols="30" placeholder="Content"></textarea>
	<input type='submit' value='Post'/>
</form>