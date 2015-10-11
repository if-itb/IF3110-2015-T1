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
	<meta charset="utf-8">
    <title>Coppeng Exchange</title>
    <link rel="stylesheet" media="screen" href="css/style.css" >
	<script type="text/javascript" src="js/coppeng.js"></script>
</head>
<body>
	<h1>Coppeng Exchange</h1>
	<a href = "question.php">Bertanya</a>
	<!-- pertanyaan-->
	<?php
		echo '<h2>'.$row['topic'].'</h2>';
		echo '<p>'.$row['content'].'</p>';
		echo '<p>Ditanyakan oleh '.$row['name'].' | ';
		echo ''.$row['email'].'</p>';
		echo '<a href= "question.php?id='.$row['id'].'">Edit</a>';
	?>
	<br>
	<div>
		<button type="button" onclick="getVote('q',<?php echo $row['id'] ?>,1)">UP</button>
		<p id="voteq<?php echo $row['id'];?>"><?php echo $row['vote'];?></p>
		<button type="button" onclick="getVote('q',<?php echo $row['id'] ?>,-1)">DOWN</button>
	</div>
	<!-- Jawaban --> 
	<h2><?php echo $row2['numAns']; ?> Jawaban</h2> <hr>
	<?php
		$query = "select * from answer where q_id = '".$q_id."' order by id";
		$data = mysql_query($query);
	?>
	<?php while($row3 = mysql_fetch_array($data)): ?> 
			<div>
			<p> <?php $row3['content']; ?></p>
			<p>Dijawab oleh <?php echo $row3['name']; ?> | <?php echo $row3['email']; ?> </p>
			</div>
			<div>
				<button type="button" onclick="getVote('a',<?php echo $row3['id']; ?>,1)">UP</button>
				<p id="votea<?php echo $row3['id'];?>"><?php echo $row3['vote'];?></p>
				<button type="button" onclick="getVote('a',<?php echo $row3['id']; ?>,-1)">DOWN</button>
			</div>
	<?php endwhile; ?>

	<h2>Beri jawaban :</h2><hr>
	<form action = 'post-answer.php?id=<?php echo $q_id;?>' name = "myForm" class = 'general-form' method = 'POST' onsubmit = "return(validateAnswer());">
		<ul>
			<li>
			<input type = 'text' name = 'Nama' placeholder="Nama" maxlength = '60'></input>
			<br>
			</li>
			<li>
			<input type = 'text' name = 'Email' placeholder="Email"  maxlength = '60'></input>
			<br>
			</li>
			<li>
			<textarea rows = '10' cols = '20' placeholder="Jawaban" name = 'Jawaban' ></textarea>
			<br>
			</li>
			<li>
			<button class = 'submit' type = 'submit' >Kirim</button>
			</li>
		</ul>
	</form>
	<?php mysql_close($link); ?>
</body>
</html>