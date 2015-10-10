<?php
include 'header.php';
?>

<?php

$conn = connectToDatabase();

$asker_name = $_POST["asker_name"];
$asker_email = $_POST["asker_email"];
$question_topic = $_POST["question_topic"];
$content = $_POST["content"];

$sql = "INSERT INTO question (question_id, asker_name, asker_email, question_topic, question_content, question_vote) VALUES (NULL, '".$asker_name."', '".$asker_email."', '".$question_topic."', '".$content."', 0)";
echo $sql;
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