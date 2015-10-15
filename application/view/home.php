<div id="search">
	<div class="pull-left">
		<input type="search" id="search-form">
	</div>
	<div class="pull-right">
		<button id="search-btn">Search</button>
	</div>
</div>

<div class="align-center" id="ask">
	<p>
		Cannot find what you are looking for? <a href="?controller=thread&action=form">Ask here</a>
	</p>
</div>

<div id="thread-list-title">
	<h2>Recently Asked Questions</h2>
</div>
<hr>

<?php foreach ($threads as $thread) { ?>

	<div>
		<div class="pull-left">
			<div class="floating-box">
				<h3><?php echo $thread->n_vote; ?></h3>
				<h3>Votes</h3>
			</div>
			<div class="floating-box">
				<h3><?php echo $thread->n_answer; ?></h3>
				<h3>Answers</h3>
			</div>
		</div>

		<div class="topic">
			<h4><a href="?controller=thread&action=detail&query=<?php echo $thread->id; ?>"><?php echo $thread->topic; ?></a></h4>
			<p><?php echo $thread->getShrinkcontent($thread->content, 100); ?></p>
		</div>

		<div class="edit">
			<p>
				asked by <span class="name" ><?php echo $thread->author; ?></span> | 
				<a href="?controller=thread&action=formUpdate&query=<?php echo $thread->id; ?>">edit</a> | 
				<a class="delete" href="#">delete</a>
			</p>
		</div>	
	</div>
	<hr>

<?php } ?>