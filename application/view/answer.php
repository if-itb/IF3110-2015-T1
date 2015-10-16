<div id="thread-answer-title">
	<h2><?php echo count($answers); ?> Answer</h2>
</div>
<hr>

<?php foreach ($answers as $answer) { ?>

	<div class="answer">
		<table>
			<tr>
				<td class="vote">
					<div class="upvote" onclick="answerVoteUp(<?php echo URL; ?>,<?php echo $answer->id; ?>)"><img src="<?php echo URL; ?>/public/img/upvote.png" alt="up"></div>
					<div class="votes" id="<?php echo answer . $answer->id; ?>" ><?php echo $answer->n_vote; ?></div>
					<div class="downvote" onclick="answerVoteDown(<?php echo URL; ?>,<?php echo $answer->id; ?>)"><img src="<?php echo URL; ?>/public/img/downvote.png" alt="down"></div>
				</td>
				<td class="answer-content">
					<?php echo $answer->content; ?> 
				</td>
			</tr>
		</table>
		<div class="answered">
			<p>answered by <?php echo $answer->email; ?> at <?php echo $answer->date; ?>
		</div>	
	</div>
	<hr>

<?php } ?>

<div id="your-answer">
	<h2>Your Answer</h2>
</div>

<div class="form" id="answer-form">
	<form action="?controller=answer&action=post&query=<?php echo $answer->thread_id; ?>" method="POST">
		<input type="text" name="user_name" id="user_name" placeholder="Name">
		<input type="email" name="user_email" id="user_email" placeholder="Email">
		<textarea name="answer_content" id="answer_content" rows="10" placeholder="Content"></textarea>
		<input type="submit" id="submit" value="Post">
	</form>
</div>