<?php
include 'connect.php';

date_default_timezone_set("Asia/Bangkok");
$q_name = htmlspecialchars($_POST["q_name"]);
$q_email = htmlspecialchars($_POST["q_email"]);
$q_topic = htmlspecialchars($_POST["q_topic"]);
$q_content = htmlspecialchars($_POST["q_content"]);
$q_date = date("Y-m-d H:i:s");

$sql = "INSERT INTO questions (q_name, q_email, q_topic, q_content, q_date)
VALUES ('$q_name', '$q_email', '$q_topic', '$q_content', '$q_date')";

if ($conn->query($sql) === TRUE) {
	$q_id = mysqli_insert_id($conn);
	$conn->close();
	echo "<script>window.location = 'view.php?id=". $q_id ."'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	$conn->close();
}
?>