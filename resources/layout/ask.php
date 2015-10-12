<h2>What's your question?</h2>
<hr>
<div class="center">
	<form action="" method="POST">
		<input class='ask-item' type='text' name='name' placeholder='Name' value='<?php echo $name;?>'>
		<input class='ask-item' type='text' name='email' placeholder='Email' value='<?php echo $email;?>'>
		<input class='ask-item' type='text' name='topic' placeholder='Question Topic' value='<?php echo $topic;?>'>
		<textarea class='ask-item' rows='12' name='question' placeholder='Content'><?php echo $question;?></textarea>
		<input type='hidden' name='id' value='<?php	echo $id;?>'>
		<br>
		<div class="ask-button right">
			<input class="rectangle" type="submit" value="Post">
		</div>
	</form>
</div>
