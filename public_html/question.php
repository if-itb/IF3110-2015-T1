<?php
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	require_once(LIBRARY_PATH . "/templateFunctions.php");

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
		$stmtq = $db->prepare('SELECT * FROM questions WHERE id = ?');
		$stmtq->execute(array($_GET['id']));
		$question = $stmtq->fetch();
		
		$stmta = $db->prepare('SELECT * FROM answers WHERE question_id = ?');
		$stmta->execute(array($_GET['id']));
		$answer = $stmta->fetchAll();
	
		$variables = array(
			'id' => $_GET['id'],
			'question' => $question,
			'answers' => $answer,
		);
	
		renderLayoutWithContentFile("detail.php", $variables);
	
	} else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$answer = $db->prepare('INSERT INTO answers(question_id, answer, name, email) VALUES(?, ?, ?, ?)');
		$answer->execute(array($_POST['id'], $_POST['answer'], $_POST['name'], $_POST['email']));
	
		header('Location: /question.php?id=' . $_POST['id']);
		die();

	} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['q_id'])){
		if ($_GET['vote'] == 'up'){
			$upvote = $db->prepare("UPDATE questions SET vote = vote + 1 WHERE id = ?");
		} else {
			$upvote = $db->prepare("UPDATE questions SET vote = vote - 1 WHERE id = ?");
		}
		$upvote->execute(array($_GET['q_id']));

		$vote = $db->prepare('SELECT vote FROM questions where id = ?');
		$vote->execute(array($_GET['q_id']));
		$currentVote = $vote->fetch();

		echo $currentVote[vote];
	
	} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['a_id'])){
		if ($_GET['vote'] == 'up'){
			$upvote = $db->prepare("UPDATE answers SET vote = vote + 1 WHERE id = ?");
		} else {
			$upvote = $db->prepare("UPDATE answers SET vote = vote - 1 WHERE id = ?");
		}
		$upvote->execute(array($_GET['a_id']));

		$vote = $db->prepare('SELECT vote FROM answers where id = ?');
		$vote->execute(array($_GET['a_id']));
		$currentVote = $vote->fetch();

		echo $currentVote[vote];
	}
?>