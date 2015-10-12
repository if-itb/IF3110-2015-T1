<html>
<head>
	<meta http-equiv="refresh" content="0; URL='home.php'" />
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StackExchange";

$qid = $_POST["qid"];
$nama = $_POST["name"];
$email = $_POST["email"];
$topic = $_POST["topic"];
$content = $_POST["content"];
$datetime = date("Y-m-d H:i:s");

//Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Cek koneksi
if (!$conn) {
	die("Connection failed : ". mysqli_connect_error());
}

$sql = "UPDATE question SET nama='$nama', email='$email', topic='$topic', content='$content', datetime='$datetime' WHERE qid='$qid'";

if (mysqli_query($conn, $sql)) {
	//Sukses
} else {
	//Error
}

mysqli_close($conn);

?>
</body>
</html>