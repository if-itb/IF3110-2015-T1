<?php
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	require_once(LIBRARY_PATH . "/templateFunctions.php");

	$stmtq = $db->query('SELECT * FROM question');
	$stmta = $db->query('SELECT question_id, COUNT(1) FROM answer GROUP BY question_id');
	$questions = $stmtq->fetchAll(PDO::FETCH_ASSOC);
	$answers = $stmta->fetchAll(PDO::FETCH_ASSOC);
	
	$variables = array(
		'questions' => $questions,
		'answers' => $answers
	);

	renderLayoutWithContentFile("home.php", $variables);
?>