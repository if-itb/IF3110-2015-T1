<?php 
	require('config.php'); 
	include('function.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Coppeng Exchange</title>
    <link rel="stylesheet" media="screen" href="css/style.css" >
	<script type="text/javascript" src="js/coppeng.js"></script>
</head>
<body>
	<h1>Coppeng Exchange</h1>
	<hr>
	<form action = 'search.php' class = 'general-form' method = 'GET'>
		<ul>
			<input type = 'text' name = 'key' maxlength = '160'>
			<button type = 'submit' class = 'submit'>Cari</button>
		</ul>
	</form>
	<p> 
		Tidak dapat menemukan yang anda cari ? Tanyakan <a href = "question.php">disini!</a>
	</p>
	<h3>Pertanyaan baru-baru ini</h3> <hr>
	<?php
		$query = "select * from question order by id desc";
		$data = mysql_query($query);
		while($row = mysql_fetch_array($data)) {
			echo '<div>';
			echo '<h2> <a href = view-question.php?id='.$row['id'].'>'.$row['topic'].'</a></h2>';
			echo '<p>'.shorten_string($row['content'], 50).'</p>';
			echo '</div>';
			echo '<p>Vote '.$row['vote'].'</p>';
			$query2 = "SELECT COUNT(id) AS numAns FROM answer WHERE q_id = '".$row['id']."'";
			$data2 = mysql_query($query2);
			$row2 = mysql_fetch_array($data2);
			echo '<p>Jawaban '.$row2['numAns'].'</p>';
			echo '<a href= "question.php?id='.$row['id'].'">Edit</a>  | ';
			echo '<td align = "center"><a href= "javascript:delete_question('.$row['id'].')" >Delete</a></td>';
			
		}
	?>
	
	<?php mysql_close($link); ?>
</body>
<html>