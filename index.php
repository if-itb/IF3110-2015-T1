<?php
	include("header.php");
?>

	<div class="search-form">
		<form id="search">
                <input class="searchbox" name="search" size="65"placeholder="Search"> </textarea>
                <button class="button"type="submit" >Search</button>
		</form>
	</div>
	<div class="banner-bottom">
		<ul class="bottom-content">
			<li><span>Cannot find what you are looking for?</span></li>
			<li><a class="link" href="ask.php">Ask here</a></li>
		</ul>
	</div>

	<div class="content">
		<h2>Recently Asked Questions</h2>
		<div class="bottom-line"></div>
		<div class="vote text-center col">
		<p>0<br>vote</p>
		</div>
		<div class="answer text-center col">
			<p>0<br>answer</p>
		</div>
		<div class="question text-center col">
			<p><strong>The question topic goes here </strong> <br> <br>
			The question content goes here</p>
		</div>
		<div class="question-info text-center col">
			<p> asked by Someone | <a class="edit" href="#"> edit </a> | <a class="delete" href="#"> delete </a> </p>
		</div>
	</div>

<?php
	include("footer.php");
?>
