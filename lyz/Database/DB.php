<?php namespace Lyz\Database;

class DB {
	static $host = '127.0.0.1';
	static $uname = 'dancinggrass';
	static $passwd = '';
	static $dbname = 'asklyz';
	/* Query to the database */
	public static function query($query) {
		static $db = null;
		if (!isset($db)) {
			$db = new \mysqli(self::$host, self::$uname, self::$passwd, self::$dbname);
		}

		$results = $db->query($query);

		try {
			$rows = [];
			for ($i = 0; $i < $results->num_rows; $i++) {
				$row = $results->fetch_assoc();
				array_push($rows, $row);
			}
			return $rows;
		}
		catch (\Exception $e) {
			return $results;
		}

	}
}
