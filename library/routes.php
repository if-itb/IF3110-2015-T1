<?php 
	function call ($controller, $action, $query) {
		require_once(ROOT . DS . 'application' . DS . 'controller'. DS . 'class.' . $controller . 'controller.php');

		switch ($controller) {
			case 'thread' :
				require_once(ROOT. DS . 'application' . DS . 'model'. DS . 'class.thread.php');
				$controller = new ThreadController();
			break;
			case 'answer' :
				require_once(ROOT. DS . 'application' . DS . 'model'. DS . 'class.answer.php');
				$controller = new AnswerController();
			break;
		}

		if ($query == '')
			$controller->{ $action }();
		else
			$controller->{ $action }($query);
	}

	// Need for validation 
	$controllers = array('thread' => ['home', 'detail', 'form', 'post', 'formUpdate', 'update', 'upvote', 'downvote', 'delete', 'error'],
											 'answer' => ['upvote', 'downvote', 'post']);

	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
			call($controller, $action, $queryString);
		}
		else {
			call('thread', 'error', '');
		}
	}
	else {
		call('thread', 'error', '');
	}	
?>