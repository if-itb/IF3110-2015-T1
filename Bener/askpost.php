<!DOCTYPE html>
<html>
<head>

<?php include 'connect.php';?>
	
<?php
$name = $_POST["name"];
$email = $_POST["email"];
$topic = $_POST["topic"];
$content = $_POST["content"];

$sql = "INSERT INTO Question (name, email, topic, content)
VALUES ('$name', '$email', '$topic', '$content')";

if (mysqli_query($conn, $sql)) {
	header('Location: answer.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>

</body>
</html>
