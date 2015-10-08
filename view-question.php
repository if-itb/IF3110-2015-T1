<?php require('config.php');
	$post_id = $_GET["id"];
	$query = "select * from question where id = '".$post_id."'";
	$data = mysql_query($query);
	$row = mysql_fetch_array($data);
	$q_id = $row['id'];
	if ($row['id'] == NULL) {
		header('Location: index.php');
	}
	$query2 = "SELECT COUNT(id) AS numAns FROM answer WHERE q_id = '".$row['id']."'";
	$data2 = mysql_query($query2);
	$row2 = mysql_fetch_array($data2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Coppeng</title>
</head>
<body>
	<h1>Coppeng Exchange</h1>
	<a href = "question.php">Bertanya</a>
	<?php
		echo '<h2>'.$row['topic'].'</h2>';
		echo '<p>'.$row['content'].'</p>';
		echo '<p>Ditanyakan oleh '.$row['name'].' | ';
		echo ''.$row['email'].'</p>';
		echo '<a href= "question.php?id='.$row['id'].'">Edit</a>';
	?>
	<h2><?php echo $row2['numAns']; ?> Jawaban</h2> <hr>
	<?php
		$query = "select * from answer where q_id = '".$q_id."' order by id";
		$data = mysql_query($query);
		while($row = mysql_fetch_array($data)) {
			echo '<div>';
			echo '<p>'.$row['content'].'</p>';
			echo '<p>Dijawab oleh '.$row['name'].' | '.$row['email'].'</p>';
			echo '</div>';
		}
	?>
	<h2>Beri jawaban :</h2><hr>
	<form action = 'post-answer.php?id=<?php echo $q_id;?>' method = 'POST' >
	<input type = 'text' name = 'Nama' placeholder="Nama" maxlength = '60'></input>
	<br>
	<input type = 'text' name = 'Email' placeholder="Email" maxlength = '60'></input>
	<br>
	<textarea rows = '10' cols = '20' name = 'Jawaban' placeholder="Jawaban" ></textarea>
	<br>
	<input type = 'submit'  value = 'Kirim'>
</form>
	<?php mysql_close($link); ?>
</body>
</html>