<?php
header('Location: /');
include 'header.php';
include 'database.php';

$conn = db_init();

$name = $_POST['name'];
$mail = $_POST['email'];
$cont = $_POST['content'];
$qid = $_POST['id'];

if (!empty($_POST['ans']))
{
  $query = "INSERT INTO answer (qid, username, email, isi) VALUES ($qid, '$name', '$mail', '$cont')";
}
else 
{
  $topic = $_POST['topic'];
  if ($qid < 0) 
  {
    $query = "INSERT INTO question (username, topik, email, isi) VALUES ('$name', '$topic', '$mail', '$cont')";
  }
  else 
  {
    $query = "UPDATE question SET username='$name', topik='$topic', email='$mail', isi='$cont' WHERE Id = $qid";
  }
}

mysqli_query($conn, $query);
mysqli_close($conn);