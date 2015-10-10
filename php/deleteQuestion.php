<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 09/10/15
 * Time: 14:37
 */

#Sambungan database
require("connectDatabase.php");

#Variable id pertanyaan yang akan dihapus
$idDeleted = $_POST['idDeleted'];

#Execute Query

//Menghapus jawaban - jawaban dari pertanyaan yang akan dihapus
$query = "DELETE FROM answers WHERE q_id='$idDeleted'";
mysqli_query($link,$query);

//Menghapus pertanyaan
$query1 = "DELETE FROM questions WHERE q_id='$idDeleted'";
mysqli_query($link,$query1);


#Close Connection
mysqli_close($link);

#Redirect ke List Question
header("Location: ../index.html");
exit();
