<?php namespace Lyz;

class App {
	public function __construct() {
	}
	private function initiate() {
		$params = null;
		$method= $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		switch ($method) {
		case 'GET': $params = &$_GET; break;
		case 'POST': $params = &$_POST; break;
		}

		$this->request = new Request($uri, $method, $params);
	}
	public function run() {
		$this->initiate();

		$this->response = new Route($this->request);
	}
	public function __destruct() {
	}
}
