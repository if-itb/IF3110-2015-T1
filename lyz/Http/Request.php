<?php namespace Lyz\Http;

class Request {
	/* Request URI */
	private static $uri;
	/* Request method */
	private static $method;
	/* Request parameters */
	private static $params;

	public static function create($uri, $method, $params) {
		self::$uri = $uri;
		self::$method = $method;
		self::$params = $params;
	}

	public static function method() {
		return self::$method;
	}

	public static function uri() {
		return self::$uri;
	}

	public static function params() {
		return self::$params;
	}
}
