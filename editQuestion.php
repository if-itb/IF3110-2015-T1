<?php
include 'header.php';
?>

<?php

$conn = connectToDatabase();

$asker_name = $_POST["asker_name"];
$asker_email = $_POST["asker_email"];
$question_topic = $_POST["question_topic"];
$content = $_POST["content"];

$sql = "Update question Set asker_name='".$asker_name."', asker_email='".$asker_email."', question_topic='".$question_topic."', question_content='".$content."' 
Where question_id=".$_GET["id"];

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