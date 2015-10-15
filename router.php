<?php
	function call($controller, $action) {
  	require_once('controllers/'.$controller . '_controller.php');
		switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
			case 'questions':
        require_once('models/question.php');
        $controller = new QuestionsController();
      break;
			case 'answers':
        require_once('models/answer.php');
        $controller = new AnswersController();
      break;
    }
		
		$controller->{ $action }();
  }

	$controllers = array('pages' => ['home', 'error'],
                       'questions' => ['index', 'show', 'update', 'edit', 'delete', 'insert','vote'],
											 'answers' => ['index', 'insert', 'vote']);
	
	if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>