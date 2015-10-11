<?php namespace Lyz\Http;

class Request {
	public function __construct($uri, $method, $params) {
		$this->uri = $uri;
		$this->method = $method;
		$this->params = $params;
	}
}
