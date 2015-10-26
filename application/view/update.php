<div id="thread-new-title">
	<h2>Update your question</h2>
</div>
<hr>

<div class="form">
	<form method="POST" onsubmit="return submitThread()" action="?controller=thread&action=update&query=<?php echo $thread->id; ?>">
		<input type="text" name="user_name" id="user_name" placeholder="Name" value="<?php echo $thread->author; ?>" autofocus>
		<input type="text" name="user_email" id="user_email" placeholder="Email" value="<?php echo $thread->email; ?>">
		<input type="text" name="thread_topic" id="thread_topic" placeholder="Question Type" value="<?php echo $thread->topic; ?>">
		<textarea name="thread_content" id="thread_content" rows="10" placeholder="Content"><?php echo $thread->content; ?></textarea>
		<input type="submit" id="submit" value="Post">
	</form>
</div>