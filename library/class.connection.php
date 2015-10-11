<?php 
	require_once (ROOT . DS . 'config' . DS . 'config.php');	

	class Connection {
		private static $instance = NULL;

		private function __construct() {}

		private function __clone() {}

		public static function getInstance() {
			if (!isset(self::$instance))
				$pdo_options[PDO::$ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				self::$instance = new PDO('mysql:host=$DB_HOST;dbname=$DB_SCHEMA','$DB_USERNAME','$DB_PASSWORD', $pdo_options);
			}
			return self::$instance;
		}
	}
?>