<?php require('config.php');
	if(! isset( $_GET["key"] )) {
		header('Location: index.php');
	}
	$cari = trim($_POST["key"]);
	$query = "select id, topic, content,vote from question where topic LIKE  '%".$cari."%' or content LIKE  '%".$cari."%'";
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
			echo '<p>Vote '.$row['vote'].'</p>';
			$query2 = "SELECT COUNT(id) AS numAns FROM answer WHERE q_id = '".$row['id']."'";
			$data2 = mysql_query($query2);
			$row2 = mysql_fetch_array($data2);
			echo '<p>Jawaban '.$row2['numAns'].'</p>';
			echo '<a href= "question.php?id='.$row['id'].'">Edit</a>';
		}
	?>
	<?php mysql_close($link); ?>
</html>