<?php namespace Lyz\Http;

class Route {
	private static $route_list = [];

	public static function get($uri, $controllers) {
		$controllers = explode("@", $controllers);
		$class_name = $controllers[0];
		$method_name = $controllers[1];
		
		self::$route_list['GET'] = [ 'uri' => $uri, 'class' => $class_name, 'method' => $method_name ];
	}

	public static function post($uri, $controllers) {
		$controllers = explode("@", $controllers);
		$class_name = $controllers[0];
		$method_name = $controllers[1];
		
		self::$route_list['POST'] = [ 'uri' => $uri, 'class' => $class_name, 'method' => $method_name ];
	}
}
