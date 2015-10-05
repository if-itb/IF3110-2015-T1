<?php

// index.php

/**
 * Ibrohim Kholilul Islam
 * 
 * AsterMVC framework
 *
 * 13513090
 */

include_once("system/const.php");
include_once("system/loader.php");
include_once("system/controller.php");
include_once("system/model.php");
include_once("config.php");


bootstrap();

function bootstrap(){

	$currentUriArray = getArrayURL();
	
	$resolve = resolveController($currentUriArray);

	if ($resolve['status'] == STATUS_OK) {

		$controller = instantiateController($resolve);

	} else {

		return show404($resolve['message']);

	}

	if ($controller['status'] == STATUS_OK) {

		$executionStatus = executeFunction($resolve, $controller);

	} else {

		return show404($controller['message']);

	}

	if (isset($executionStatus['status']) && $executionStatus['status'] != STATUS_OK) {

		return show404($executionStatus['message']);

	}


}

function getArrayURL(){

	$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$uriArray = explode('/', $uri);

	array_shift($uriArray);

	if ((count($uriArray) > 0) && ($uriArray[0] == 'index.php')) array_shift($uriArray);

	return $uriArray;

}

function resolveController($uriArray){

	$i = 0;
	
	$path = 'controllers/';

	if (empty($uriArray) || $uriArray[0] == "") {
		$uriArray = array(DEFAULT_CONTROLLER);		
	}

	foreach ($uriArray as $pathSegment) {

		if (file_exists($path.$pathSegment)) {

			$path = $path.$pathSegment.'/';

		} else {

			if (file_exists($path.$pathSegment.".php")) {

				if ((count($uriArray) > $i+1) && ($uriArray[$i+1]!='')){

					$function  = $uriArray[$i+1];

					if (count($uriArray) > $i+2)
						$arguments = array_slice($uriArray, $i+2);	
					else
						$arguments = array();

				} else {

					$function  = "index";
					$arguments = array();

				}

				return array(
						'status'=>STATUS_OK,
						'path'=>$path.$pathSegment.".php",
						'controller'=>ucwords($pathSegment),
						'function'=>$function,
						'arguments'=>$arguments,
						'arguments'=>array_slice($uriArray, $i+2)
					);

			} else{

				return array(
						'status' => STATUS_FILE_NOT_FOUND,
						'message' => "file: $path$pathSegment.php not found."
					);

			}

		}

		$i++;
	}
}

function instantiateController(&$resolve){

	assert($resolve['status'] == STATUS_OK, 'file not found.');

	include $resolve['path'];

	if (class_exists($resolve['controller']))
		return array(
				'status' => STATUS_OK,
				'instance' => new $resolve['controller']
			);
	else
		return array(
				'status' => STATUS_FILE_NOT_FOUND,
				'message'  => "Class not found."
			);

}

function executeFunction(&$resolve, &$controller){

	assert($controller['status'] == STATUS_OK, 'class not found.');

	if (method_exists($controller['instance'] , $resolve['function'])) {

		$executionStatus = call_user_func_array(
			array($controller['instance'], $resolve['function']),
			$resolve['arguments']
		);

		return $executionStatus;

	} else {
		return array(
				'status' => STATUS_FILE_NOT_FOUND,
				'message'  => "Method not found."
			);
	}

}

function show404($message){
	http_response_code(STATUS_FILE_NOT_FOUND);
	
	if (ENVIRONMENT == "development")
		echo $message;
	else
		echo "404";
}
?>
