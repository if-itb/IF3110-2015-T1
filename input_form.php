<html>
<body>
<?php
	$name=$_POST["name"];
	$email=$_POST["email"];
	$topic=$_POST["topic"];
	$content=$_POST["content"];
	//$conn= mysql_connect("127.0.0.1","root","");
	//Koneksi Database
	$my['host']	= "localhost";
	$my['user']	= "root";
	$my['pass']	= "";
	$my['dbs']	= "stackexchange";

	$koneksi = mysql_connect($my['host'], $my['user'], $my['pass']);
	if (!$koneksi) {
		echo "Gagal koneksi ke database!";
		mysql_error();
	}
	mysql_select_db($my['dbs'])
		or die ("Database tidak ditemukan!".mysql_error());
	//input database
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
<!-- Welcome <?php// echo $name;?> </br>
Your email address is <?php// echo $email;?> </br>
Your topic is <?php //echo $topic;?> </br>
Your question is <?php //echo $content;?> -->
</body>
</html>