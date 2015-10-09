<?php
	
	function makeDBConnection(){
		global $db;
		$dbname = "db_stackexchange";
		$servername = "localhost";
		$username = "root";
		$password = "";
		$charset = "utf8";

		$db = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset='.$charset, $username, $password);
	}
	
	function displayListQuestion($_html, $db){
		$strReplace = array("[[title]]", "[[datetime]]", "[[username]]", "[[countVotes]]", "[[countAnswers]]");
		$dbquery = "SELECT * FROM question
								NATURAL JOIN user";
		foreach($db->query($dbquery) as $row){
			$strTarget = array($row["title"], $row["datetime"], $row["name"], $row["countvotes"], $row["countanswers"]);
			echo str_replace($strReplace, $strTarget, $_html);
		}
	}

?>