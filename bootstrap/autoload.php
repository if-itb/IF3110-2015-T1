<?php

require_once __DIR__ . '/consts.php';

function __autoload($class_name) {
	$class_path = BASE_PATH . lcfirst(str_replace('\\', DIRECTORY_SEPARATOR, $class_name)) . '.php'; 
	if (file_exists($class_path)) {
		include $class_path;
	}
	else {
		throw new exception('Class ' . $class_name . ' not found in ' . $class_path . '.');
	}
}
