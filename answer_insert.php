<?php

$name = $_POST ["name"];
$email = $_POST["email"];
$content = $_POST["content"];
$no_question = $_POST[""];
//menyambungkan ke databases
$link = mysqli_connect("127.0.0.1", "root", "", "WBD");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


//memasukkan query ke databases 
$query = "insert into answer (no_answer,no_question,name,email,content,answer,vote) values (NULL, '$name' ,'$email','$topic','$content', 0,0)";

if ($link->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $link->error;
}


mysqli_close($link);
header("Location: http://localhost/list.php");

?>


