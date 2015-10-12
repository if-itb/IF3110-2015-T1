<?php
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
?>