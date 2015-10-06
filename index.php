<?php	
	require_once("database.php");
	
	/*if(isset($_POST['type']))
	{
		if (isset($_POST['type'])) {
		if ($_POST['type'] == 'ask')
			postQuestion($_POST);
	}

	$q = '';*/
	postQuestion($_POST);
	
	$q = '';
	if (isset($_GET['q']) && !is_null($_GET['q'])) {
		$q = $_GET['q'];
		$questions = getQuestions($_GET['q']);
	} else {
		$questions = getQuestions();
	}	
	?>
	
	
	<?php if (count($questions) === 0) echo "Be the first person to ask the question!" ?>
	
	
	
	

