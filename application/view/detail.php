<div id="thread-detail-title">
	<h2><a href=""><?php echo $thread->topic; ?></a></h2>
</div>
<hr>

<div id="question">
	<table>
		<tr>
			<td class="vote">
				<div class="upvote"></div>
				<div class="votes"><?php echo $thread->n_vote; ?></div>
				<div class="downvote"></div>
			</td>
			<td id="question-content">
				<?php echo $thread->content; ?> 
			</td>
		</tr>
	</table>
	<div class="edit">
		<p>asked by <?php echo $thread->author; ?> at <?php echo $thread->date; ?> | <a href="">edit</a> | <a class="delete" href="">delete</a></p>
	</div>	
</div>