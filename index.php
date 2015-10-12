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
<div id = "wrapper">
	<h1 class = "center"><a href="index.php">Coppeng Exchange</a></h1>
	<div id="main-page" onload="function() {document.getElementById('autofocus').focus();}">
	<div id="main-search" class="center">
	<form action = 'search.php' id = "main-search" method = 'GET'>
		<ul>
			<input type = 'text' id = "search-bar" name = 'key' maxlength = '160' required>
			<input type = 'submit' value = 'Cari'>
		</ul>
	</form>
	<p> 
		Tidak dapat menemukan yang anda cari ? Tanyakan <a href = "question.php">disini!</a>
	</p>
	</div>
	<div class = "question">
	<h3>Pertanyaan baru-baru ini</h3> <hr>
	<?php
		$query = "select * from question order by id desc";
		$data = mysql_query($query);
	?>
	<?php while($row = mysql_fetch_array($data)): ?>
			<div class="row">
			<h2> <a href = view-question.php?id=<?php echo $row['id'];?>><?php echo $row['topic']; ?></a></h2>
			<p><?php echo htmlspecialchars(shorten_string($row['content'], 50));?></p>
			<br>
			<div class="col vote in-numbers">
				<div class = "flag">Vote</div>
				<div class = "number"> <?php echo $row['vote']; ?></div>
			</div>
			<?php
				$query2 = "SELECT COUNT(id) AS numAns FROM answer WHERE q_id = '".$row['id']."'";
				$data2 = mysql_query($query2);
				$row2 = mysql_fetch_array($data2);
			?>
			<div class = "col answers in-numbers">
			<div class = "flag">Jawaban</div> <div class = "number"><?php echo $row2['numAns'];?></div>
			</div>
			
			
				<div class = "controls" align = "right">
				ditanyakan oleh <span class="name"><?php echo $row['email']; ?></span> |
				<span class="link edit"> <a href= "question.php?id=<?php echo $row['id']; ?>">Edit</a> </span>
				<span class="link delete"> <a href= "javascript:delete_question(<?php echo $row['id'];?>)" >Delete</a></span>
				</div>
			</div>
			<br><hr>
	<?php endwhile; ?>
	
	<?php mysql_close($link); ?>
	</div>
	</div>
</div>
</body>
<html>