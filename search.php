<?php
	include "views/header.php";
	require_once "views/search.view.php";
?>
	<div class="container">
		<br>
		<h2>Search Result</h2>
		<div>
			<?php showResult()?>
		</div>
	</div>
<script src="assets/js/confirmation.js"></script>
<?php include "views/footer.php";?>