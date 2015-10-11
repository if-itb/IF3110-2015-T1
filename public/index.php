<?php    
 
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', dirname(dirname(__FILE__)));
	 
	require_once (ROOT . DS . 'library' . DS . 'class.connection.php');

	if (isset($_GET['controller']) && isset($_GET['action'])) {
		$controller = $_GET['controller'];
		$action = $_GET['action'];
	}
	else { // default 
		$controller = 'pages';
		$action = 'home';
	}

?>
