<?php

include 'connect.php';

date_default_timezone_set("Asia/Bangkok");
$a_name = htmlspecialchars($_POST["a_name"]);
$a_email = htmlspecialchars($_POST["a_email"]);
$a_content = htmlspecialchars($_POST["a_content"]);
$a_qid = htmlspecialchars($_POST["a_qid"]);
$a_date = date("Y-m-d H:i:s");

$sql = "INSERT INTO answers (a_name, a_email, a_content, a_date, a_qid)
VALUES ('$a_name', '$a_email', '$a_content', '$a_date', '$a_qid')";

if ($conn->query($sql) === TRUE) {
	$conn->close();
	echo "<script>window.location = 'view.php?id=". $a_qid ."'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	$conn->close();
}
?>