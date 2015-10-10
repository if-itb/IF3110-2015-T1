<?php
include 'header.php';
?>

<?php

$conn = connectToDatabase();

$name = $_POST["answerer_name"];
$email = $_POST["answerer_email"];
$content = $_POST["content"];

$sql = "INSERT INTO answer (answer_id, answerer_name, answerer_email, answer_content, answer_vote, question_id)
VALUES (NULL, '".$name."', '".$email."', '".$content."', 0, ".$_GET["id"].")";

if (mysqli_query($conn, $sql)) {
    header("Location: detail.php?id=".$_GET["id"]);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>

<?php
include 'footer.php';
closeDatabase($conn);
?>