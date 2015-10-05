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


function postQuestion($name,$email,$topic,$content){
	$error = "";
	$valid = true;
		
	//name
	if (!(strlen($name)>0)) {
		$error.="Nama tidak boleh kosong</br>";
		$valid = false;
	}
	//email
	if (!(strlen($email)>0)) {
		$error.="Email tidak boleh kosong</br>";
		$valid = false;
	} else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error.="Format email salah</br>";
			$valid = false;
		}
	}
	if (!(strlen($topic)>0)) {
		$error.="Topic tidak boleh kosong</br>";
		$valid = false;
	}
	if (!(strlen($content)>0)) {
		$error.="Content tidak boleh kosong</br>";
		$valid = false;
	}
	if($valid){
		$con = connectDB();
		$tbl_question = $GLOBALS['tbl_question'];
		$stmt = $con->prepare("INSERT INTO $tbl_question(name,email,topic,content,create_date,update_date) VALUES (?,?,?,?,NOW(),NOW())");
		$stmt->bind_param('ssss',$name,$email,$topic,$content);
		$stmt->execute();
		$stmt->close();
	}
	return $error;
}
?>