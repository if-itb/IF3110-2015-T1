<script type="text/javascript" src="assets/js/functions.js"></script>
<form class="form-wrapper" method='post' action='?controller=questions&action=search'>
	<input type="text" name='keyword' placeholder="Search here..." required>
	<button type="submit">Search</button>
	<div class="clearfix"></div>
	<div id="suggestion">
			Cannot find what you are looking for? <a href="?controller=questions&action=insert">ask here</a>.
	</div>
</form>

<h1>
	Recently Asked Questions
</h1>
				
<div class="question-list">

<?php
	require_once('views/questions/index.php');
?>
</div> <!-- END question-list -->