<!DOCTYPE html>
<html>
<head>

<?php include 'connect.php';?>
	
<?php
$name = $_POST["name"];
$email = $_POST["email"];
$content = $_POST["content"];

$sql = "INSERT INTO Answer (name, email, content)
VALUES ('$name', '$email', '$content')";

if (mysqli_query($conn, $sql)) {
	header('Location: answer.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>




</body>
</html>
