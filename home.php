<?php
	include "views/header.php";
	require_once "views/home.view.php";
?>

	<div class="center">
		<form action="">
			<input type="text" id="search" name="search" placeholder="Type your search-keywords here...">
			<input type="submit" value="Search">
		</form> 	
		Cannot find what you are looking for? <a href="ask.php">Ask here</a>
	</div>
	<br>
	<h2>Recently Asked Questions</h2>
	<div id="question">
		<?php showQuestionList()?>
	</div>
</body>
</html>