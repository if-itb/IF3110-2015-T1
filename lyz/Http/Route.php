<?php namespace Lyz\Http;

class Route {
	private static $route_list = [];

	public static function get($uri, $controllers) {
		$controllers = explode("@", $controllers);
		$class_name = $controllers[0];
		$method_name = $controllers[1];
		
		if (!isset(self::$route_list['GET']))
			self::$route_list['GET'] = [];

		array_push(self::$route_list['GET'], [
			'uri' => $uri, 
			'class' => BASE_CONTROLLER . $class_name, 
			'method' => $method_name 
		]);
	}

	public static function post($uri, $controllers) {
		$controllers = explode("@", $controllers);
		$class_name = $controllers[0];
		$method_name = $controllers[1];

		if (!isset(self::$route_list['POST']))
			self::$route_list['POST'] = [];
		
		array_push(self::$route_list['POST'], [ 
			'uri' => $uri, 
			'class' => BASE_CONTROLLER .$class_name, 
			'method' => $method_name 
		]);
	}

	public static function resolve() {
		foreach (self::$route_list[Request::method()] as $route) {
			if ($route['uri'] == Request::uri()) {
				return $route;
			}
		}
	}

	public static function redirect($url) {
		header('Location: /' . $url);
		die();
	}
}
