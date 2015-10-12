<html>
<head>
	<meta http-equiv="refresh" content="0;URL='question.php?qid=<?php echo $_POST["qid"]?>'">
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
$content = $_POST["content"];
$datetime = date("Y-m-d H:i:s");

//Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Cek koneksi
if (!$conn) {
	die("Connection failed : ". mysqli_connect_error());
}

$sql = "INSERT INTO answer (nama,email,content,qid,datetime) VALUES ('$nama','$email','$content','$qid','$datetime')";

if (mysqli_query($conn, $sql)) {
	//Sukses
} else {
	//Error
}

$sqlUpdate = "UPDATE question SET Answers=Answers+1 WHERE qid='$qid'";
if (mysqli_query($conn, $sqlUpdate)) {
	//Sukses
} else {
	//Error
}

mysqli_close($conn);
?>
</body>
</html>