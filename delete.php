<?php
include 'header.php';
?>

<?php

$conn = connectToDatabase();

$sql = "Delete From question Where question_id =".$_GET["id"];
if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>

<?php
include 'footer.php';
closeDatabase($conn);
?>