<?php
	include ('../view/layout/header.php');

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$results = searchByString($_POST['search']);

		foreach ($results as $question) {
			makeQuestionPart($question);
		}

	} else {

?>

	<div id="form">

		<div class="content">
			<form action="" method="post">
				<input type="text" id="search" name="search" placeholder="search here...">
				<button type="submit">Search</button>
			</form>
		</div>

	</div>

	<center>Cannot find what you are looking for? <a href="/ask">Ask here</a></center>
	<br>


<?php
		makeFullQList(0);
	}

	include ('../view/layout/footer.php');
?>

