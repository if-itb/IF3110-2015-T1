<script type="text/javascript" src="assets/js/functions.js"></script>
<form class="searchform" method='post' action='?controller=questions&action=search'>
	<input type="text" name='keyword' required>
	<button type="submit">Search</button>
	<div class="clearfix"></div>
</form>
	<div>
			Cannot find what you are looking for? <a class="a-orange" href="?controller=questions&action=insert">Ask here</a>
	</div>

<h1>
	Recently Asked Questions
</h1>
				
<div class="question-list">

<?php
	require_once('views/questions/index.php');
?>
</div> <!-- END question-list -->