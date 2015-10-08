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
$sql = "INSERT INTO Question (name, email, topic, content)
VALUES ('Doe', 'john@example.com', 'Galau', 'Tio malem-malem galau soalnya ganemu runner hew')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>

<?php
$sql = "SELECT name, email, topic, content FROM Question";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "name: " . $row["name"]. " - email: " . $row["email"]. " " . $row["topic"]. "<br>";
    }
} else {
    echo "0 results";
}
?>

</body>
</html>