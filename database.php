<?php

	$servername = "localhost";
	$username = "root";
	$password = "venzel";
	$DB_Name = "simplestack";

	$connect = mysqli_connect($servername, $username, $password, $DB_Name);

	mysqli_set_charset($connect,'utf8');

	function getQuestions($searchQuery = "", $sort = "create_date DESC") {
		global $connect;
		if ($searchQuery == "")
			$q = "SELECT * FROM question";
		else
			$q = "SELECT * FROM question WHERE Title LIKE '%$searchQuery%' OR content LIKE '%$searchQuery%' ORDER BY $sort";
		$rq = mysqli_query($connect, $q);
		$r = array();
		while ($row = mysqli_fetch_array($rq, MYSQLI_ASSOC)) {
			
			$r[] = $row;
		}

		return $r;
	}

	function getQuestion($id) {
		global $connect;
		$q = "SELECT * FROM question WHERE Q_ID=$id";
		$rq = mysqli_query($connect, $q);
		$row = mysqli_fetch_array($rq, MYSQLI_ASSOC);
		return $row;
	}
	
	function getAnswers($q_id, $sort = "Vote DESC, Date DESC") {
		global $connect;
		$q = "SELECT * FROM answer WHERE Q_ID=$q_id ORDER BY $sort";
		$rq = mysqli_query($connect, $q);
		$r = array();
		while ($row = mysqli_fetch_array($rq, MYSQLI_ASSOC)) {
			$r[] = $row;
		}
		return $r;
	}
	
	function postQuestion($data) {
		global $connect;
		$q = NULL;
		if ($data['q_id'] == '') {
			//create new question
			$q = "INSERT INTO question (Name, Email, Title, Content, Date)
				VALUES ('$data[Name]', '$data[Email]', '$data[Title]', '$data[Content]', CURRENT_TIMESTAMP)";
		} else {
			//update question
			$q = "UPDATE question
				SET
					Name='$data[Name]',
					Email='$data[Email]',
					Title='$data[Title]',
					Content='$data[Content]'
				WHERE
					Q_ID = $data[q_id]";
		}
					
		$no_error = mysqli_query($connect, $q);
		return $no_error;
	}
	
	function postAnswer($data) {
		global $connect;

		$q = "INSERT INTO answer (Q_ID, Name, Email, Content, Date)
		VALUES ('$data[q_id]', '$data[Name]', '$data[Email]', '$data[Content]', CURRENT_TIMESTAMP)";
				
		$no_error = mysqli_query($connect, $q);
		return $no_error;
	}

	function countAnswers($q_id) {
		global $connect;
		$q = "SELECT COUNT(Q_ID) AS count from answer where Q_ID=$q_id";
	    $rq = mysqli_query($connect, $q);
	    $answer = mysqli_fetch_array($rq, MYSQLI_ASSOC)['count'];
	    return $answer;
	}


?>
