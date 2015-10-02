<?php 
	include ('../model.php');
?>

<?php
	if ( isset($_GET['id']) ) {
		$id = $_GET['id'];

		makeQuestionView($id);
		makeFullAList($id);
	}
?>



