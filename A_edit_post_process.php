<?php
include('A_config.php');

if(isset($_POST['submit'])){
	session_start();
	$id = $_SESSION['post_id'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$judul = $_POST['judul'];
	$tanggal = $_POST['tanggal'];
	$konten = $_POST['konten'];
	session_destroy();
	$query = mysql_query("update post set nama='$nama', email='$email', judul='$judul', tanggal='$tanggal', konten='$konten' where post_id='$id'") or die(mysql_error());

	if ($query) {
		header('location:A_index.php');
	}

}

?>