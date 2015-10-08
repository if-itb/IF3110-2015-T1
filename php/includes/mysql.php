<?php


$dbc = mysqli_connect('localhost', 'root', '', 'questionanswer' );
mysql_set_charset($dbc, 'utf8');

function getQuestions($searchQuery = "", $sort = "create_date DESC"){
	global $dbc;
	
	if ($searchQuery="")
		$q = "SELECT * FROM question ORDER BY $sort";
	else 
		$q = "SELECT * FROM question WHERE content LIKE '%$searchQuery%' OR title LIKE '%$searchQuery%' ORDER BY $sort";
	$rq = mysqli_query($dbc,$q);
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


function postQuestion($data){
	global $dbc;
	$q = null;
	if ($data['question_id' == ''){
		$q = "insert into question (name,email,title,content,create_date) values ('$data[name]', '$data[email]', '$data[title]', '$data[content]', CURRENT_TIMESTAMP)";
	} else {
		$q = "update question set name  = '$data[name]', email = '$data[email]', title = '$data[title]', content = '$data[content]' where question_id = $data[question_id] ";
		
	}
	
	$report = mysqli_query($dbc, $q);
	return $report;
}

function getAnswer($question_id, $sort = "vote DESC, create_date DESC"){
	global $dbc;
	$q = "SELECT * from answer where question_id=$question_id order by $sort";
	$rq = mysqli_query($dbc, $q);
	while ($row = mysqli_fetch_array($rq,MYSQLI_ASSOC)){
		$r[] = $row;
	}
	return $r;
}

function getAnswerCount ($question_id){
	global $dbc;
	$q = "select count(answer_id) from answer where question = $question_id";
	$rq = mysqli_query($dbc, $q);
	$r = mysqli_fetch_array($rq,MYSQLI_ASSOC)['c'];
	return $r;
}

function vote($db, $id, $count){
	global $dbc;
	$q = "UPDATE $db SET vote = (vote + $count) where ". $db . " _id=$id";
	$report = mysqli_query($dbc, $q);
	return $report;
}

function getVoteCount($db, $id){
	global $dbc;
	$q = "select vote from $db where " . $db. " _id = $id";
	$rq = mysqli_query($dbc, $q);
	$r = mysqli_fetch_array($rq, MYSQLI_ASSOC) ['vote'];
	return $r;
}

?>