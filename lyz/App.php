<?php namespace Lyz;

use Lyz\Http\Request;
use Lyz\Http\Route;
use Lyz\Render\View;

class App {
	public function __construct() {
		include 'routes.php';

		$params = null;
		$method = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		switch ($method) {
		case 'GET': $params = &$_GET; break;
		case 'POST': $params = &$_POST; break;
		}

		$this->request = new Request($uri, $method, $params);
	}
	public function run() {
		$cont_info = Route::resolve($this->request);
		$class_name = $cont_info['class'];
		$method_name = $cont_info['method'];

		echo $class_name . ' ' . $method_name . '\n';

		$controller = new $class_name();
		$controller->$method_name();
	}
	public function __destruct() {
	}
}
