
<?php
	$db_con = mysql_connect("localhost","root");
	if (!$db_con){
		die('Could not connect: ' .mysql_error());
	}

	mysql_select_db("stackexchange", $db_con);

	if ($_GET["edit"] != true) {
		$date = date("Y-m-d H:i:s");

		$sql="INSERT INTO question_list (name, email, topic, question, date_time)
		VALUES
		('$_POST[name]','$_POST[email]','$_POST[topic]','$_POST[content]', '$date')";

		if (!mysql_query($sql,$db_con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "1 record added";
	} else {
		$query = "UPDATE question_list SET ";
		$updateVal = "name='$_POST[name]', email='$_POST[email]', topic='$_POST[topic]', question='$_POST[content]'";
		$query .= $updateVal . "WHERE qid=" . $_GET{"qid"};
		if (mysql_query($query, $db_con)) {
			echo "Question updated!";
		} else {
			echo "Error updating question: " . mysql_error($db_con);
		}
	}
	mysql_close($db_con)
?>