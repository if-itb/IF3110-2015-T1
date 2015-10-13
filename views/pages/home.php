<form class="form-wrapper">
	<input type="text" placeholder="Search here..." required>
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