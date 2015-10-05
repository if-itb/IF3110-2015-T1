<?php
$tbl_answer = $tbl_question = "";

function connectDB(){
	if(file_exists("db.php")){
		require 'db.php';
	} else {
		die("Error");
	}
	$GLOBALS['tbl_answer'] = $tbl_answer;
	$GLOBALS['tbl_question'] = $tbl_question;
	$con = mysqli_connect("$host","$user","$passdb","$db");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	return $con;
}

function isQuestionExist($id){
	$con = connectDB();
	$tbl_question = $GLOBALS['tbl_question'];
	$result = mysqli_query($con,"SELECT * FROM $tbl_question WHERE id = '$id'");
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	return is_array($row);
}

function getQuestionRow($id){
	$con = connectDB();
	$tbl_question = $GLOBALS['tbl_question'];
	$result = mysqli_query($con,"SELECT * FROM $tbl_question WHERE id = '$id'");
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	return $row;
}

function validateName($name){
	$err = "";
	if (strlen($name)<=0){
		$err = "Nama tidak boleh kosong</br>";
	}
	return $err;
}

function validateEmail($email){
	$err = "";
	if (strlen($email)<=0){
		$err = "Topic tidak boleh kosong</br>";
	} else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$err = "Format email salah</br>";
		}
	}
	return $err;
}

function validateTopic($topic){
	$err = "";
	if (strlen($topic)<=0){
		$err = "Topic tidak boleh kosong</br>";
	}
	return $err;
}

function validateContent($content){
	$err = "";
	if (strlen($content)<=0){
		$err = "Content tidak boleh kosong</br>";
	}
	return $err;
}

function postQuestion($type,$name,$email,$topic,$content,$id=NULL){
	$error = "";
		
	$error .= validateName($name);
	$error .= validateEmail($email);
	$error .= validateTopic($topic);
	$error .= validateContent($content);
	
	$valid = (strlen($error)>0)?false:true;
	
	if($valid){
		$con = connectDB();
		$tbl_question = $GLOBALS['tbl_question'];
		if(strcmp("insert",$type) == 0){//insert
			$stmt = $con->prepare("INSERT INTO $tbl_question(name,email,topic,content,create_date,update_date) VALUES (?,?,?,?,NOW(),NOW())");
			$stmt->bind_param('ssss',$name,$email,$topic,$content);
			$stmt->execute();
			$stmt->close();
		} else if(strcmp("update",$type) == 0) {//update
			$stmt = $con->prepare("UPDATE $tbl_question SET name=?,email=?,topic=?,content=?,update_date=NOW() WHERE id=?");
			$stmt->bind_param('ssssd',$name,$email,$topic,$content,$id);
			$stmt->execute();
			$stmt->close();
		}
	}
	return $error;
}

function postAnswer($name,$email,$content){
	$error = "";
		
	$error .= validateName($name);
	$error .= validateEmail($email);
	$error .= validateContent($content);
	
	$valid = (strlen($error)>0)?false:true;
	
	if($valid){
		$con = connectDB();
		$tbl_answer = $GLOBALS['tbl_answer'];		
		$stmt = $con->prepare("INSERT INTO $tbl_answer(name,email,content,create_date,update_date) VALUES (?,?,?,NOW(),NOW())");
		$stmt->bind_param('ssss',$name,$email,$topic,$content);
		$stmt->execute();
		$stmt->close();
	}
	return $error;
}
 
function getVoteNumber($type,$id){	
	$con = connectDB();
	if(strcmp($type,'q') == 0){
		$tbl_question = $GLOBALS['tbl_question'];
		$sql = "SELECT * FROM $tbl_question WHERE id=$id";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		return $row["votes"];
	} else {
		$tbl_answer = $GLOBALS['tbl_answer'];
		$sql = "SELECT * FROM $tbl_answer WHERE id=$id";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		return $row["votes"];
	}
}

function vote($type,$n,$id){
	$con = connectDB();
	$tbl_answer = $GLOBALS['tbl_answer'];
	$tbl_question = $GLOBALS['tbl_question'];
	$tbl = "";
	if(strcmp($type,'q') == 0){
		$tbl = $tbl_question;
	} else if(strcmp($type,'a') == 0){
		$tbl = $tbl_answer;
	}
	if(isQuestionExist($id)) {
		$stmt = $con->prepare("UPDATE $tbl SET votes=votes+$n WHERE id=?");
		$stmt->bind_param('d',$id);
		$stmt->execute();
		$stmt->close();
	}
	if(strcmp($type,'q') == 0){
		echo getVoteNumber('q',$id);
	} else if(strcmp($type,'a') == 0){
		echo getVoteNumber('a',$id);
	}
}

if(isset($_GET['f'])){
	$id=$_GET['id'];
	$f=$_GET['f'];
	if(strcmp($f,"voteQuestionUp") == 0){
		vote('q',1,$id);
	} else if (strcmp($f,"voteQuestionDown") == 0){
		vote('q',-1,$id);
	} else if (strcmp($f,"voteAnswerUp") == 0){
		vote('a',1,$id);
	} else if (strcmp($f,"voteAnswerDown") == 0){
		vote('a',-1,$id);
	} 
}

function getAnswers($id){
	$con = connectDB();
	$tbl_answer = $GLOBALS['tbl_answer'];
	if(isQuestionExist($id)) {
		$sql = "SELECT * FROM $tbl_answer WHERE question_id=$id";
		$result = $con->query($sql);	
	}
	return $result;
}

function countAnswers($id){
	$result = getAnswers($id);
	return $result->num_rows;
}

function getAnswerRows($id){
	$result = getAnswers($id);
	return $result->fetch_assoc();
}

?>