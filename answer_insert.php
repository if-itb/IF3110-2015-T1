<?php

$name = $_POST ["name"];
$email = $_POST["email"];
$content = $_POST["content"];
$no_question = $_GET["no_question"];

//menyambungkan ke databases
$link = mysqli_connect("127.0.0.1", "root", "", "WBD");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


//memasukkan query ke databases answer
$query = "insert into answer (no_answer,no_question,name,email,content,vote) values (NULL,$no_question,'$name','$email','$content',0)";

if ($link->query($query) === TRUE) {
    echo "New record answer created successfully";
} else {
    echo "Error: " . $query . "<br>" . $link->error;
}

mysqli_close($link);

header("Location: http://localhost/detail.php?no_question=$no_question");

?>


