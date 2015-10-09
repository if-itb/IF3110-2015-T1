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
	
	function displayListQuestion($_html,  $_title, $_datetime, $_username, $_countVotes, $_countAnswers){
		$strReplace = array("[[title]]", "[[datetime]]", "[[username]]", "[[countVotes]]", "[[countAnswers]]");
		$strTarget = array($_title, $_datetime, $_username, $_countVotes, $_countAnswers);
		
		echo str_replace($strReplace, $strTarget, $_html);
	}

?>