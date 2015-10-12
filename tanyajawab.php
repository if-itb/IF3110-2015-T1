<html>
<head>
	<h1 align="center">Stack Exchange</h1>
</head>

<body>
	<h1>The questions goes here</h1>
	<?php
		// $name=$_GET["name"];
		// $email=$_GET["email"];
		// $topic=$_GET["topic"];
		// $content=$_GET["content"];
		$my['host']	= "localhost";
		$my['user']	= "root";
		$my['pass']	= "";
		$my['dbs']	= "stackexchange";

		$koneksi = mysql_connect($my['host'], $my['user'], $my['pass']);
		if (!$koneksi) {
			echo "Gagal koneksi ke database!";
			mysql_error();
		}
		//mysql_select_db($my['dbs'])
		//	or die ("Database tidak ditemukan!".mysql_error());

		if ($koneksi) {
			mysql_select_db("stackexchange");
			$pertanyaan= "SELECT content FROM 'question";
			$hasil=mysql_query($koneksi, $pertanyaan);
			$row=mysql_fetch_row($hasil);
			//echo $row;
			if ($row) {
					echo "berhasil";
					do {
						list($votes, $name, $email, $topic, $content)=$row;
						echo "Votes:", $votes;
						echo "</br>";
						echo "Content:", $content;
						echo "Timestamp:", $timestamp;
					} while ($row= mysql_fetch_row($hasil) );
			mysql_close($koneksi);
			} else {
				//echo $content;
				echo "Tidak ada";
				echo "</br>";
			}
		//} else { 
		//	echo "Server not found";
		}
	?>
</body>

</html>
