<?php
	function call($controller, $action) {
  	require_once('controllers/'.$controller . '_controller.php');
		switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
    }
		$controller->{ $action }();
  }
?>