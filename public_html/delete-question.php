<?php
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	require_once(LIBRARY_PATH . "/templateFunctions.php");

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
		try{
			$question = $db->prepare('DELETE FROM questions WHERE id = ?');
			$question->execute(array($_GET['id']));
			$answer = $db->prepare('DELETE FROM questions WHERE question_id = ?');
			$answer->execute(array($_GET['id']));
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		header('Location: /');
		die();
	}
?>