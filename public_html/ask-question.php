<?php
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	require_once(LIBRARY_PATH . "/templateFunctions.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		try{
			$id = substr($_SERVER['QUERY_STRING'], 3);
			$stmtsrc = $db->query("SELECT * FROM question WHERE id = $id");
			$row_count = $stmtsrc->rowCount();
			if ($row_count > 0){
				$stmt = $db->prepare("UPDATE question SET topic = ?, question = ?, name = ?, email = ? WHERE id = '$id'");
			} else{
				$stmt = $db->prepare('INSERT INTO question(topic, question, name, email) VALUES(?, ?, ?, ?)');
			}			
			$stmt->execute(array($_POST['topic'], $_POST['question'], $_POST['name'], $_POST['email']));
		
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		renderLayoutWithContentFile("ask.php");
	} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id'])){
		try{
			$stmt = $db->prepare('SELECT * FROM question WHERE id = ?');
			$stmt->execute(array($_GET['id']));
			$question = $stmt->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		$variables = array(
			'id' => $_GET['id'],
			'question' => $question
		);
		renderLayoutWithContentFile("ask.php", $variables);
	} else{
		renderLayoutWithContentFile("ask.php");
	}
?>