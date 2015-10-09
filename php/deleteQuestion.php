<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 09/10/15
 * Time: 14:37
 */

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require("connectDatabase.php");

$idDeleted = $_POST['idDeleted'];

#Execute Query

#Menghapus jawaban - jawaban dari pertanyaan yang akan dihapus
$query = "DELETE FROM answers WHERE q_id='$idDeleted'";
mysqli_query($link,$query);

#Menghapus pertanyaan
$query1 = "DELETE FROM questions WHERE q_id='$idDeleted'";
mysqli_query($link,$query1);


#Close Connection
mysqli_close($link);

#Redirect ke List Question
header("Location: ../index.html");
exit();
