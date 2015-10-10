<?php
	    
	/* Main Call Function 
	 * Parsing url-parameter dan menginstansiasi objek controller
	 *
	 * HOST/ControllerName/ActionName/QueryString
	 */
	 
	function callHook() {
		global $url;
	 
    $urlArray = array();
    $urlArray = explode("/",$url);
 
		$controller = $urlArray[0];
    array_shift($urlArray);
    $action = $urlArray[0];
    array_shift($urlArray);
		$queryString = $urlArray;
 
    $controllerName = $controller;
    $controller = ucwords($controller); 
    $model = rtrim($controller, 's');

    $controller .= 'Controller';
    $dispatch = new $controller($model,$controllerName,$action);
 
    if ((int) method_exists($controller, $action)) {
      call_user_func_array(array($dispatch,$action),$queryString);
    } 
	}
	  
	/* Autoload any classes that are required */
	 
	function __autoload($className) {
		if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
	    require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
	  } 
		else if (file_exists(ROOT . DS . 'application' . DS . 'controller' . DS . strtolower($className) . '.php')) {
	    require_once(ROOT . DS . 'application' . DS . 'controller' . DS . strtolower($className) . '.php');
	  } 
		else if (file_exists(ROOT . DS . 'application' . DS . 'model' . DS . strtolower($className) . '.php')) {
	    require_once(ROOT . DS . 'application' . DS . 'model' . DS . strtolower($className) . '.php');
	  } 
	}
	 

	/* Invoke callHook */
	callHook();