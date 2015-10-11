<?php

$name = $_POST ["name"];
$email = $_POST["email"];
$topic = $_POST["topic"];
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


//mengupdate query dari databases 
$query = "update question set name='$name', email='$email', topic='$topic', content='$content', answer=0, vote=0 where no_question=$no_question";

if ($link->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $link->error;
}


mysqli_close($link);
header("Location: http://localhost/detail.php?no_question=$no_question");

?>