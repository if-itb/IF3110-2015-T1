<?php
	
	$db_con = mysql_connect("localhost", "root");
	if (!$db_con){
		die('Could not connect: '.mysql_error());
	}
	mysql_select_db("stackexchange", $db_con);
	if(!empty($_GET["delete"])) {
		$sql = "DELETE FROM question_list WHERE qid=" . $_GET["qid"];


		if (mysql_query($sql, $db_con)) {
			$sql = "DELETE FROM answer_list WHERE qid=" . $_GET["qid"];
		    if (mysql_query($sql, $db_con)) {
			    echo "Question deleted successfully";
			} else {
				echo "Error deleting record:" . mysql_error();
			}		
		} else {
		    echo "Error deleting record: " . mysql_error();
		}
	}

	mysql_close($db_con);
?>