<?php
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	require_once(LIBRARY_PATH . "/templateFunctions.php");

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id'])){
		try{
			$stmtq = $db->prepare('SELECT * FROM questions WHERE id = ?');
			$stmtq->execute(array($_GET['id']));
			$question = $stmtq->fetch();
			
			$stmta = $db->prepare('SELECT * FROM answers WHERE question_id = ?');
			$stmta->execute(array($_GET['id']));
			$answer = $stmta->fetchAll();
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		$variables = array(
			'id' => $_GET['id'],
			'question' => $question,
			'answers' => $answer,
		);
		renderLayoutWithContentFile("detail.php", $variables);
	}
?>