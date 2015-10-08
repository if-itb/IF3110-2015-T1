<!DOCTYPE html>
<html>
<body>

<?php
echo "My first PHP script!";
?>  

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StackExchange";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

<?php
$sql = "INSERT INTO Question (question_id, name, email, topic, content, vote)
VALUES (0001, 'Doe', 'john@example.com', 'Galau', 'Tio malem-malem galau soalnya ganemu runner hew', 10)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>

</body>
</html>