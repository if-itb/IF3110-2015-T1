<?php
	class Database {
			private static $instance = NULL;

			private function __construct(){}
		
			private function __clone() {}

			static function getInstance() {
					$dbname = "db_stackexchange";
					$host = "localhost";
					$user = "root";
					$password = "";
					if(!isset(self::$instance)){
							self::$instance = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
					}
					return self::$instance;
			}
	}
?>