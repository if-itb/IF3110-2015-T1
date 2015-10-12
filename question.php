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

	<h2>Apa pertanyaan anda ?</h2> <hr>
	<?php if (isset($_GET['id']) && $_GET['id'] != NULL) : ?>
		<?php 
			require('config.php');
			$id = $_GET['id'];
			$query = "select name, email, topic, content from question where id = '".$id."'";
			$data = mysql_query($query);
			$row = mysql_fetch_array($data);
		?>
	<form class="block" action = 'post.php?id=<?php echo $id; ?>' name = "myForm" class = 'general-form' method = 'POST' onsubmit = "return(validateQuestion());">
		<ul>
			<input type = 'text' name = 'Nama' placeholder="Nama" value = "<?php echo $row['name']?>" maxlength = '60'></input>
			<input type = 'text' name = 'Email' placeholder="Email" value = "<?php echo $row['email']?>" maxlength = '60'></input>
			<input type = 'text' name = 'Topik' placeholder="Topik" value = "<?php echo $row['topic']?>" maxlength = '140'></input>
			<textarea rows = '50' cols = '20' placeholder="Konten" name = 'Konten' ><?php echo $row['content']?></textarea>
			<button class = 'submit' type = 'submit'>Update</button>
		</ul>
	</form>
	<?php mysql_close($link); ?>
	<?php else : ?>
	<form class="block" action = 'post.php' name = "myForm" class = 'general-form' method = 'POST' onsubmit = "return(validateQuestion());">
		<ul>
			<input type = 'text' name = 'Nama' placeholder="Nama" maxlength = '60'></input>
			<input type = 'text' name = 'Email' placeholder="Email"  maxlength = '60'></input>
			<input type = 'text' name = 'Topik' placeholder="Topik" maxlength = '140'></input>
			<textarea rows = '50' cols = '20' placeholder="Konten" name = 'Konten' ></textarea>
			<button class = 'submit' type = 'submit'>Kirim</button>
		</ul>
	</form>
	<?php endif; ?>
	</div>
</body>
</html>