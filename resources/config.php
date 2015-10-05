<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_database = 'stack_clone';
  

$db = new PDO("mysql:host=$db_host;dbname=$db_database;charset=latin1", $db_user, $db_password);

defined("LIBRARY_PATH")
	or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("LAYOUT_PATH")
	or define("LAYOUT_PATH", realpath(dirname(__FILE__) . '/layout'));
?>