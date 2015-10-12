<?php
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	require_once(LIBRARY_PATH . "/templateFunctions.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		try{
			$questions = $db->query("SELECT * FROM questions
							LEFT OUTER JOIN
							(SELECT question_id, COUNT(1) FROM answers GROUP BY question_id) cnt
							ON questions.id=cnt.question_id
							WHERE questions.question LIKE'%" . $_POST['search'] . "%'");
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		$variables = array(
			'questions' => $questions->fetchAll()
		);
		renderLayoutWithContentFile("home.php", $variables);
	} else{
		try{
			$questions = $db->query('SELECT * FROM questions
							LEFT OUTER JOIN
							(SELECT question_id, COUNT(1) FROM answers GROUP BY question_id) cnt
							ON questions.id=cnt.question_id');
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		$variables = array(
			'questions' => $questions->fetchAll()
		);
		renderLayoutWithContentFile("home.php", $variables);
	}
	
?>