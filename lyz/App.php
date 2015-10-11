<?php namespace Lyz;

use Lyz\Http\Request;
use Lyz\Http\Route;
use Lyz\View\View;

class App {
	protected $response = 'No content.';

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
		$route = Route::resolve($this->request);
		$class_name = $route['class'];
		$method_name = $route['method'];

		$controller = new $class_name();
		$this->response = $controller->$method_name();
	}

	public function send() {
		echo $this->response;
	}
}
