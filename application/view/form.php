<div id="thread-new-title">
	<h2>What's your question</h2>
</div>
<hr>

<div class="form" id="thread-form">
	<form method="POST" onsubmit="return submitThread()" action="?controller=thread&action=post">
		<input type="text" name="user_name" id="user_name" placeholder="Name" autofocus>
		<input type="text" name="user_email" id="user_email" placeholder="Email">
		<input type="text" name="thread_topic" id="thread_topic" placeholder="Question Type">
		<textarea name="thread_content" id="thread_content" rows="10" placeholder="Content"></textarea>
		<input type="submit" id="submit" value="Post">
	</form>
</div>