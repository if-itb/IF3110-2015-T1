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

$sqlid = "SELECT * FROM answers WHERE Answer_ID = (SELECT MAX(Answer_ID) FROM answers)";
$aid = $conn->query($sqlid);
while($row = mysqli_fetch_assoc($aid))
$id = $row["Answer_ID"] + 1;

$t = time();
$time = (date("Y-m-d h:i:s",$t));

$sql = "INSERT INTO answers (Answer_ID, Question, Name, Email, Content, Votes, DateAndTime)
VALUES (" . $id . "," . $_GET["Question"] . ",'" . $_GET["Name"] . "','" . $_GET["Email"] . "','" . $_GET["Content"] . "',0,'".$time."')";

if (mysqli_query($conn, $sql)) {
    header('Location: question.php?id='.$_GET["Question"]);
}

mysqli_close($conn);
?>
</body>
</html>
