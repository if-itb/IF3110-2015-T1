<?php
	include ('../view/layout/header.php');

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {

		deleteQuestion($_GET['id']);
		header("Location: /home");
		die();

	}
	
	include ('../view/layout/footer.php');
?>

