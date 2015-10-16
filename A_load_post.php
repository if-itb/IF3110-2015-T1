<?php
	include("A_config.php");
	$id = $_GET['post_id'];
	$query_komen = mysql_query("select * from post where post_id = '$id' order by post_id desc") or die("haha die lagi");

	while($row = mysql_fetch_array($query_konten)){
	$post_id = $row['post_id'];
	$nama = $row['nama'];
	$email = $row['email'];
	$judul = $row['judul'];
	//$tanggal = $row['tanggal'];
	$konten = $row['konten'];
	/*
				echo "<li class=\"art-list-item\">";
                    echo "<div class=\"art-list-item-title-and-time\">";
                     echo "<h2 class=\"art-list-title\"><a href=\"mailto:$email\">$nama</a></h2>";
                      echo  "<div class=\"art-list-time\">$tanggal</div>";
                echo    "</div>";
                   echo "<p>$konten</p>";
              echo  "</li>";*/
			  
			  
			  
			  echo "<li class=\"art-list-item\">";
			  echo "<p>$ </p>"; //JUM Votes & JUM Answers
			  echo "<p>Votes     Answers</p>";//atur spya rapi di bwh JUM
			  
			  echo "<p>$judul</p>";
			  echo "<p>$konten</p>";
			  
			  echo "<p>Asked by $nama at $tanggal</p>"; //bikin class utk css: teks di kanan
			  echo "</li>";
	}
?>