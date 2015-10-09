<?php


$dbc = mysqli_connect('localhost', 'root', '', 'qsstack' );
mysqli_set_charset($dbc, 'utf8');

function getQuestions($searchQuery = "", $sort = "create_date DESC") {
	global $dbc;
	if ($searchQuery == "")
		$q = "SELECT * FROM question ORDER BY $sort";
	else
		$q = "SELECT * FROM question WHERE title LIKE '%$searchQuery%' OR content LIKE '%$searchQuery%' ORDER BY $sort";
	$rq = mysqli_query($dbc, $q);
	$r = array();
	while ($row = mysqli_fetch_array($rq, MYSQLI_ASSOC)) {
		$row['answer'] = getAnswerCount($row['question_id']);
		$r[] = $row;
	}
	return $r;
}

function getQuestion($id){
	global $dbc;
	
	$q = "SELECT * FROM question WHERE question_id = $id";
	$rq = mysqli_query($dbc, $q);
	$row = mysqli_fetch_array($rq, MYSQLI_ASSOC);
	return $row;
}


function postQuestion($data) {
	global $dbc;
	$q = NULL;
	if ($data['question_id'] == '') {
		//create new question
		$q = "INSERT INTO question (name, email, title, content, create_date)
			VALUES ('$data[name]', '$data[email]', '$data[title]', '$data[content]', CURRENT_TIMESTAMP)";
	} else {
		//update question
		$q = "UPDATE question
			SET
				name='$data[name]',
				email='$data[email]',
				title='$data[title]',
				content='$data[content]'
			WHERE
				question_id = $data[question_id]";
	}
				
	$no_error = mysqli_query($dbc, $q);
	return $no_error;
}
function deleteQuestion($id) {
	global $dbc;
	$q = "DELETE FROM question WHERE question_id=$id";
	$no_error = mysqli_query($dbc, $q);
	return $no_error;
}
function getAnswers($question_id, $sort = "vote DESC, create_date DESC") {
	global $dbc;
	$q = "SELECT * FROM answer WHERE question_id=$question_id ORDER BY $sort";
	$rq = mysqli_query($dbc, $q);
	$r = array();
	while ($row = mysqli_fetch_array($rq, MYSQLI_ASSOC)) {
		$r[] = $row;
	}
	return $r;
}
function postAnswer($data) {
	global $dbc;
	$q = "INSERT INTO answer (question_id, name, email, content, create_date)
		VALUES ('$data[question_id]', '$data[name]', '$data[email]', '$data[content]', CURRENT_TIMESTAMP)";
				
	$no_error = mysqli_query($dbc, $q);
	return $no_error;
}
function getAnswerCount($questionId) {
	global $dbc;
	$q = "SELECT COUNT(answer_id) AS c FROM answer WHERE question_id=$questionId";
	$rq = mysqli_query($dbc, $q);
	$r = mysqli_fetch_array($rq, MYSQLI_ASSOC)['c'];
	return $r;
}
function vote($db, $id, $count) {
	global $dbc;
	$q = "UPDATE $db SET vote=(vote + $count) WHERE " . $db . "_id=$id";
	$no_error = mysqli_query($dbc, $q);
	return $no_error;
}
function getVoteCount($db, $id) {
	global $dbc;
	$q = "SELECT vote FROM $db WHERE " . $db . "_id=$id";
	$rq = mysqli_query($dbc, $q);
	$r = mysqli_fetch_array($rq, MYSQLI_ASSOC)['vote'];
	return $r;
}

?>