<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT); 
	/**
	* 
	*/
	class Database 
	{
		private static $instance = NULL;

		private function __construct(){}

		private function __clone(){}

		public static function getInstance(){
			if (!isset(self::$instance)){
				self::$instance = pg_connect("host=localhost dbname=mystackexchange user=postgres password=aingganteng");
			}
			return self::$instance;
		}
	}
		