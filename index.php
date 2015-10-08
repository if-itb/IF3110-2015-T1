<?php 
	require('config.php'); 
	include('function.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Coppeng Exchange</title>
</head>
<body>
	<h1>Coppeng Exchange</h1>
	<hr>
	<form action = 'search.php' method = 'GET'>
		<input type = 'text' name = 'key' maxlength = '160'>
		<input type = 'submit' value = 'Cari'>
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
	<script type="text/javascript">
		function delete_question(id)
		{
			 if(confirm('Apakah anda ingin menghapus pertanyaan ini ?'))
			 {
				window.location.href='delete.php?id='+id;
			 }
		}
	</script>
</body>
<html>