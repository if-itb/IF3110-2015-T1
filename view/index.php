<?php
	include ('../view/layout/header.php');
?>


	<div id="form">

		<div class="content">
			<form action="" method="post">
				<input disabled type="text" id="search" name="search" placeholder="search here...">
				<button disabled type="submit">Search</button>
			</form>
		</div>

	</div>

	<center>Cannot find what you are looking for? <a href="/ask">Ask here</a></center>
	<br>


<?php
	makeFullQList(0);

	include ('../view/layout/footer.php');
?>

