<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_of_questions";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlid = "SELECT * FROM questions WHERE Question_ID = (SELECT MAX(Question_ID) FROM questions)";
$sid = $conn->query($sqlid);
while($row = mysqli_fetch_assoc($sid))
$id = $row["Question_ID"] + 1;

$t = time();
$time = (date("Y-m-d h:i:s",$t));

$sql = "INSERT INTO questions (Question_ID, Name, Email, Topic, Content, Votes, DateAndTime)
VALUES (" . $id . ",'" . $_GET["Name"] . "','" . $_GET["Email"] . "','" . $_GET["Topic"] . "','" . $_GET["Content"] . "',0,'".$time."')";

if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
}

mysqli_close($conn);
?>
</body>
</html>
