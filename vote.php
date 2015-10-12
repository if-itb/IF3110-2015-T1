<html>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StackExchange";

$QID = $_REQUEST["QID"];
$AID = $_REQUEST["AID"];
$QA = $_REQUEST["QA"];
$UpDown = $_REQUEST["UpDown"];

//Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Cek koneksi
if (!$conn) {
	die("Connection failed : ". mysqli_connect_error());
}

if ($QA == "Q") {
	if ($UpDown == "Up") {
		$sql = "UPDATE question SET votes=votes+1 WHERE qid='$QID'";
	} else {
		$sql = "UPDATE question SET votes=votes-1 WHERE qid='$QID'";
	}
	$sql2 = "SELECT votes FROM question WHERE qid='$QID'";
} else {
	if ($UpDown == "Up") {
		$sql = "UPDATE answer SET votes=votes+1 WHERE aid='$AID'";
	} else {
		$sql = "UPDATE answer SET votes=votes-1 WHERE aid='$AID'";
	}
	$sql2 = "SELECT votes FROM answer WHERE aid='$AID'";
}

if (mysqli_query($conn, $sql)) {
	//Sukses
} else {
	//Error
}

$result = mysqli_query($conn,$sql2);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo $row["votes"];
	}
} else {
	
}

mysqli_close($conn);
?>
</body>
</html>