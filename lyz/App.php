<?php namespace Lyz;

use Lyz\Http\Request;
use Lyz\Http\Route;
use Lyz\View\View;

class App {
	protected $response = '';

	/* Application initialization: 
	 * - Initialize URI table lookup
	 * - Assign request to application
	 */
	public function __construct() {
		include 'routes.php';

		$params = null;
		$method = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		switch ($method) {
		case 'GET': $params = &$_GET; break;
		case 'POST': $params = &$_POST; break;
		}

		Request::create($uri, $method, $params);
	}

	/* Run app based on received request */
	public function run() {
		$route = Route::resolve();
		$class_name = $route['class'];
		$method_name = $route['method'];

		$controller = new $class_name();
		$this->response = $controller->$method_name();

		return $this;
	}

	/* Send response to client */
	public function send() {
		echo $this->response;
		return $this;
	}
}
