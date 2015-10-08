<?php require('config.php'); 
	$cari = trim($_POST["key"]);
	$query = "select id, topic, content from question where topic LIKE  '%".$cari."%' or content LIKE  '%".$cari."%'";
	$data = mysql_query($query);
?>

<!DOCTYPE html>
<html>
	<?php
		echo '<h2>Hasil untuk  "'.$cari.'" : </h2><br>';
		while($row = mysql_fetch_array($data)) {
			echo '<div>';
			echo '<h2> <a href = view-question.php?id='.$row['id'].'>'.$row['topic'].'</a></h2>';
			echo '<p>'.$row['content'].'</p>';
			echo '</div>';
		}
	?>
</html>