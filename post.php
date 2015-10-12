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

$sql = "INSERT INTO question (nama,email,topic,content,datetime) VALUES ('$nama','$email','$topic','$content','$datetime')";

if (mysqli_query($conn, $sql)) {
	//Sukses
} else {
	//Error
}

mysqli_close($conn);

?>
</body>
</html>