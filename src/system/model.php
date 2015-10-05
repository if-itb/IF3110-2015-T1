<?php

class Model {

	protected $mysqli;

	public function __construct(){
		
		$this->mysqli = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

		if (!$this->mysqli) {
		    die("Error: Unable to connect to MySQL.");
		}

	}
		
}