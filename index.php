<?php
	include("header.php");
?>

	<div class="search-form">
		<form id="search">
                <input class="searchbox" name="search" size="65"placeholder="Search"> </textarea>
                <button class="buttonSearch"type="submit" >Search</button>
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
		<?php include("questionRecent.php"); ?>
	</div>

<?php
	include("footer.php");
?>
