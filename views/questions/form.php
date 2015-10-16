<h1>
	What's your question?
</h1>
<form class='form' method='post' action='?controller=questions&action=insert' >
	<input type='text' name='authorname' placeholder="Name" />
	<input type='text' name='authoremail' placeholder="Email"/>
	<input type='text' name='topic' placeholder="Question topic"/>
	<textarea name="content" rows="7" cols="30" placeholder="Content"></textarea>
	<input type='submit' value='Post'/>
</form>