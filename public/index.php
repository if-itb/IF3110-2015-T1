<?php    
 
	define('DS', DIRECTORY_SEPARATOR);
	define('SERVER', $_SERVER['SERVER_NAME']);
	define('URL', $_SERVER['REQUEST_URI']);
	define('ROOT', dirname(dirname(__FILE__)));
	 
	require_once (ROOT . DS . 'library' . DS . 'class.connection.php');

	if (isset($_GET['controller']) && isset($_GET['action'])) {
		$controller = $_GET['controller'];
		$action = $_GET['action'];
	}
	else { // default 
		$controller = 'thread';
		$action = 'home';
	}

	if (isset($_GET['query'])) {
		$queryString = $_GET['query'];
	}
	else {
		$queryString = '';
	}

	require_once(ROOT . DS . 'application' . DS . 'view' . DS . 'layout.php');

?>
