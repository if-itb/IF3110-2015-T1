<?php
header('Location: /');
include 'header.php';
include 'database.php';

$conn = db_init();

$topic = $_POST['topic'];
$name = $_POST['name'];
$mail = $_POST['email'];
$cont = $_POST['content'];
$qid = $_POST['id'];
echo $topic.' '.$name.' '.$mail.' '.$cont;

if ($qid < 0) 
{
  $query = "INSERT INTO question (username, topik, email, isi) VALUES ('%".$name."%', '%".$topic."%', '%".$mail."%', '%".$cont."%')";
}
else 
{
  $query = "UPDATE question SET username='%".$name."%', topik='%".$topic."%', email='%".$mail."%', isi='%".$cont."%' WHERE Id = ".$qid;
}

mysqli_query($conn, $query);