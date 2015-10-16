<?php
	include("A_config.php");
	$id = $_GET['post_id'];
	$query_komen = mysql_query("select * from comment where post_id = '$id' order by comment_id desc") or die("haha die lagi");

	while($row = mysql_fetch_array($query_komen)){
	$post_id = $row['post_id'];
	$nama = $row['nama'];
	$email = $row['email'];
	$tanggal = $row['tanggal'];
	$komen = $row['komen'];
				echo "<li class=\"art-list-item\">";
                    echo "<div class=\"art-list-item-title-and-time\">";
                     echo "<h2 class=\"art-list-title\"><a href=\"mailto:$email\">$nama</a></h2>";
                      echo  "<div class=\"art-list-time\">$tanggal</div>";
                echo    "</div>";
                   echo "<p>$komen</p>";
              echo  "</li>";
	}
?>