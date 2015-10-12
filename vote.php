<?php
    include 'connect.php';
    $id = mysql_real_escape_string($_GET['id']);
    $db = mysql_real_escape_string($_GET['db']);
    $vote = mysql_real_escape_string($_GET['vote']);
  	if ($db == 'questions') {
		$sql = "UPDATE questions SET q_votes=q_votes+" .$vote. " where q_id=" . $id;
		if ($conn->query($sql) === TRUE) {
    		$sql = "SELECT q_votes FROM questions where q_id =" .$id;
    		$result = $conn->query($sql);
	        if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
	            	echo $row['q_votes']; 
	            }
	        }
	    }
	} else {
		$sql = "UPDATE answers SET a_votes=a_votes+" .$vote. " where a_id=" . $id;
		if ($conn->query($sql) === TRUE) {
    		$sql = "SELECT a_votes FROM answers where a_id =" .$id;
    		$result = $conn->query($sql);
	        if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
	            	echo $row['a_votes']; 
	            }
	        }
	    }
	}
