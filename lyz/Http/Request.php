<?php namespace Lyz\Http;

class Request {
	/* Request URI */
	private static $uri;
	/* Request method */
	private static $method;
	/* Request parameters */
	private static $params;
	/* Request referer */
	private static $referer;

	public static function create($uri, $method, $params) {
		self::$uri = parse_url($uri, PHP_URL_PATH);
		self::$method = $method;
		self::$params = $params;
	}

	public static function method() {
		return self::$method;
	}

	public static function uri() {
		return self::$uri;
	}

	public static function params($selection = null) {
		if (isset($selection)) {
			$params = [];
			foreach (self::$params as $key => $value) {
				$params[$key] = $value;
			}
		}
		return self::$params;
	}
}
