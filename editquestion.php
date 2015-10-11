<?php
include 'connect.php';

date_default_timezone_set("Asia/Bangkok");
$q_id = htmlspecialchars($_POST["q_id"]);
$q_name = htmlspecialchars($_POST["q_name"]);
$q_email = htmlspecialchars($_POST["q_email"]);
$q_topic = htmlspecialchars($_POST["q_topic"]);
$q_content = htmlspecialchars($_POST["q_content"]);
$q_date = date("Y-m-d H:i:s");

$sql = "UPDATE questions SET q_name='".$q_name."',q_email='".$q_email."',q_topic='".$q_topic."',q_content='".$q_content."',q_date='".$q_date."' where q_id = ". $q_id;

if ($conn->query($sql) === TRUE) {
	$conn->close();
	echo "<script>window.location = 'view.php?id=". $q_id ."'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	$conn->close();
}
?>