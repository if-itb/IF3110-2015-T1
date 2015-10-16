<?php
	include ("A_config.php");
	$post_id = $_GET['post_id'];
	$nama = $_GET['nama'];
	$email = $_GET['email'];
	$tanggal = date("d M Y H:i");
	$komen = $_GET['komen'];
	
	mysql_query("INSERT INTO comment(post_id,nama,email,tanggal,komen)
	values('$post_id','$nama','$email','$tanggal','$komen')
	") or die("HAHA YOU R DEAD");
	
	
?>