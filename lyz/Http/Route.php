<?php namespace Lyz\Http;

class Route {
	private static $route_list = [
		'GET' => [],
		'POST' => []
	];

	public static function get($uri, $controllers) {
		$controllers = explode("@", $controllers);
		$class_name = $controllers[0];
		$method_name = $controllers[1];
		
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
		
		array_push(self::$route_list['POST'], [ 
			'uri' => $uri, 
			'class' => BASE_CONTROLLER .$class_name, 
			'method' => $method_name 
		]);
	}

	public static function resolve($request) {
		foreach (self::$route_list[$request->method] as $route) {
			if ($route['uri'] == $request->uri) {
				return $route;
			}
		}
	}
}
