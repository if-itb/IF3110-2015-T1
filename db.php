<?php
    class DB {
        private static $instance = NULL;

        private function __construct() {}
        private function __clone() {}

        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new mysqli("localhost", "root", "", "exchangelyz");
            return self::$instance;
        }
    }
?>
