<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$vote = $_REQUEST["vote"];
$qid = $_REQUEST["qid"];
$aid = $_REQUEST["aid"];

$connect = mysql_connect("localhost","root","") or die ("Connection Error");
$selectdb = mysql_select_db("stackexchange", $connect);

/*if ($aid == 0){
	//tabel question
	$record = mysql_fetch_array(mysql_query("SELECT * FROM `question` where `id_question`='$qid'",$connect));
}
else {
	//table answer
	$record = mysql_fetch_array(mysql_query("SELECT * FROM `answer` where `id_question`='$qid' and `id_answer`='$aid'",$connect));
}

$getVote = $record[6];

if ($vote==1){
	$getVote++;
}
else {
	$getVote--;
}
*/

if ($aid == 0){
	mysql_query ("UPDATE `question` SET `votes`=`votes`+$vote WHERE `id_question`='$qid'",$connect);
	$record = mysql_fetch_array(mysql_query("SELECT * FROM `question` where `id_question`='$qid'",$connect));
	echo $record[6];
}
else{
	mysql_query ("UPDATE `answer` SET `votes`=`votes`+$vote WHERE `id_question`='$qid' and `id_answer`='$aid'",$connect);
	$record = mysql_fetch_array(mysql_query("SELECT * FROM `answer` where `id_question`='$qid' and `id_answer`='$aid'",$connect));
	echo $record[6];
}
mysql_close($connect);
?>

</body>
</html>