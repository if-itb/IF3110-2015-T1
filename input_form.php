<html>
<body>
<?php
	$name=$_POST["name"];
	$email=$_POST["email"];
	$topic=$_POST["topic"];
	$content=$_POST["content"];
	
	include "koneksi.php";
	if ($koneksi) {
		//echo $topic;
		$sql = "INSERT INTO question(name, email, topic, content) values ('$name','$email','$topic','$content')";
		$hasil=mysql_query($sql, $koneksi);
		echo "Berhasil!";
		mysql_close($koneksi);
		header("Location:tanyajawab.php");	
		exit();
	}
?>

</body>
</html>