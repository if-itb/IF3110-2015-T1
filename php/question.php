<?php

require_once("connectDatabase.php");

#Database yang di post
$name = mysqli_real_escape_string($link,$_POST['name']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$qtopic = mysqli_real_escape_string($link,$_POST['qtopic']);
$qcontent = mysqli_real_escape_string($link,$_POST['qcontent']);
$idEdited = $_POST['idEdited'];

if(!isset($idEdited)) {   // Jika berasal dari EditQuestion.php , maka $isEdited akan terset
    #Query Tambahkan Question ke Databse
    $query = "INSERT INTO questions (q_id,name,email,qtopic,qcontent,answer,vote,date) VALUES(NULL,'$name','$email','$qtopic','$qcontent',0,0,NULL)";
}
else {
    #Query Update Question dari Databse
    $query = "UPDATE questions SET name='$name', email='$email', qtopic='$qtopic', qcontent='$qcontent' WHERE q_id='$idEdited'";
}

mysqli_query($link,$query);


#Close Connection
mysqli_close($link);

#Redirect ke List Question
header("Location: ../index.html");
exit();