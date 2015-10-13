<?php
	include "views/header.php";
	require_once "views/home.view.php";
?>
	<div class="container">
		<div class="center">
			<div id="search">
				<form action="" method="GET">
					<fieldset class="clearfix">
						<input type="search" name="search" value="Type your search-keywords here..." onBlur="if(this.value=='')this.value='Type your search-keywords here...'" onFocus="if(this.value=='Type your search-keywords here...')this.value='' "> <!-- JS because of IE support; better: placeholder="Type your search-keywords here..." -->
						<input type="submit" value="Search" class="button">
					</fieldset>
				</form>
			</div>
			<br>
			Cannot find what you are looking for? <a href="ask.php">Ask here</a>
		</div>

		<br>
		<h2>Recently Asked Questions</h2>
		<div>
			<?php showQuestionList()?>
		</div>
	</div>
<script src="assets/js/confirmation.js"></script>
<?php include "views/footer.php";?>