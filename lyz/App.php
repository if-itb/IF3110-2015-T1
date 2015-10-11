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
	}
	public function __destruct() {
	}
}
