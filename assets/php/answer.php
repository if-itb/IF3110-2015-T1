<?php

$name = $_POST['Name'];	
$email = $_POST['Email'];
$konten = $_POST['Konten'];


mysql_query("INSERT INTO answer (nama, email, topik, konten,  vote, idquest)
VALUES ('$name', '$email', '$judul' ,'$konten', 0, $p )");

mysql_close($conn);
?>