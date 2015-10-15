<?php
	require 'connect.php';

	function InsertQuestion($conn, $name, $email, $topic, $content) {
		$sql = "INSERT INTO question (name, email, topic, content, vote, datetime)
			VALUES ('$name', '$email', '$topic', '$content', 0, NOW())";

		if ($conn->query($sql) === TRUE) {
		  //do nothing
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	function SelectLastID($conn){
		$selectid = "SELECT id from question ORDER BY id DESC LIMIT 1";
		$result = $conn->query($selectid);

		if ($result->num_rows > 0) {
		// output data of each row
		  while($row = $result->fetch_assoc()) {
				$id=$row["id"];
		  }
		} else {
		  echo "0 results";
		}
		return $id;
	}

	function EditQuestion($conn, $id, $name, $email, $topic, $content){
		$sql = "UPDATE question
			SET name='$name', email='$email', topic='$topic', content='$content', datetime=NOW()
			WHERE id=$id;";

		if ($conn->query($sql) === TRUE) {
		  //do nothing
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	function InsertAnswer($conn, $id, $name_ans, $email_ans, $content_ans){
		$sql = "INSERT INTO answer (id, name_ans, email_ans, content_ans, vote_ans, datetime_ans)
			VALUES ('$id', '$name_ans', '$email_ans', '$content_ans', 0, NOW())";

		if ($conn->query($sql) === TRUE) {
		  //do nothing
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	function SelectQuestion($conn, $id){
		$sql = "SELECT name, email, topic, content, vote FROM question WHERE id=$id";
		$result = $conn->query($sql);
		return $result;
	}

	function GetVote($conn,$id){
		$sql = "SELECT vote from question WHERE id=$id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		// output data of each row
		  while($row = $result->fetch_assoc()) {
				$vote=$row["vote"];
		  }
		} else {
		  echo "0 results";
		}
		return $vote;
	}

	function GetDateTime($conn,$id){
		$sql = "SELECT datetime from question WHERE id=$id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		// output data of each row
		  while($row = $result->fetch_assoc()) {
				$datetime=$row["datetime"];
		  }
		} else {
		  echo "0 results";
		}
		return $datetime;
	}

	function GetVoteAns($conn,$id){
		$sql = "SELECT vote_ans from answer WHERE id_ans=$id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		// output data of each row
		  while($row = $result->fetch_assoc()) {
				$vote=$row["vote_ans"];
		  }
		} else {
		  echo "0 results";
		}
		return $vote;
	}
?>