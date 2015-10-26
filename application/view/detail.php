<div id="thread-detail-title">
	<h2><a href=""><?php echo $thread->topic; ?></a></h2>
</div>
<hr>

<div id="question">
	<table>
		<tr>
			<td class="vote">
				<div class="upvote" onclick="threadVoteUp(<?php echo URL; ?>,<?php echo $thread->id; ?>)"><img src="<?php echo URL; ?>/public/img/upvote.png" alt="up"></div>
				<div class="votes" id="votes"><?php echo $thread->n_vote; ?></div>
				<div class="downvote" onclick="threadVoteDown(<?php echo URL; ?>,<?php echo $thread->id; ?>)"><img src="<?php echo URL; ?>/public/img/downvote.png" alt="down"></div>
			</td>
			<td id="question-content">
				<?php echo $thread->content; ?> 
			</td>
		</tr>
	</table>
	<div class="edit">
		<p>
			asked by <?php echo $thread->email; ?> at <?php echo $thread->date; ?> | 
			<a href="?controller=thread&action=formUpdate&query=<?php echo $thread->id; ?>">edit</a> | 
			<a class="delete" href="delete" href="?controller=thread&action=delete&query=<?php echo $thread->id; ?>" onclick="return confirmToDelete()">delete</a>
		</p>
	</div>	
</div>
