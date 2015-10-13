<?php
  echo "model/database.php<br>";
  class Database {
    private static $instance = NULL;
    private function __construct() {}
    private function __clone() {}
    public static function getInstance() {
      if(!isset(self::$instance)) {
        try{
        self::$instance = new PDO("mysql:host=".HOST_DB.";dbname=".NAME_DB, USERNAME_DB, PASSWORD_DB);
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
          echo "Connection failed : ".$e->getMessage()."<br>";
        }
        echo "Connection succes<br>";
      }
      return self::$instance;
    }
  }
?>