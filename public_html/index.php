<?php
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	require_once(LIBRARY_PATH . "/templateFunctions.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$questions = $db->query("SELECT * FROM questions
					LEFT OUTER JOIN
					(SELECT question_id, COUNT(1) FROM answers GROUP BY question_id) cnt
					ON questions.id=cnt.question_id
					WHERE questions.topic LIKE'%" . $_POST['search'] . "%' OR questions.question LIKE'%" . $_POST['search'] . "%' ORDER BY questions.id DESC");
	} else{
			$questions = $db->query('SELECT * FROM questions
						LEFT OUTER JOIN
						(SELECT question_id, COUNT(1) FROM answers GROUP BY question_id) cnt
						ON questions.id=cnt.question_id ORDER BY questions.id DESC');
	}

	$variables = array(
		'deleteConfirm' => 'Do you really want to submit the form?',
		'questions' => $questions->fetchAll()
	);

	renderLayoutWithContentFile("home.php", $variables);
?>