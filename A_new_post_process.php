<?php

if(isset($_POST['submit'])){
	include('A_config.php');

	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$judul = $_POST['judul'];
	//$tanggal = $_POST['tanggal']; //???!!!
	$konten = $_POST['konten'];

	$query = mysql_query("insert into post (post_id,nama,email,judul,konten) values('', '$nama', '$email', '$judul', '$konten')") or die(mysql_error());
	if ($query) {
		header('location:A_index.php');
	}

}
?>
