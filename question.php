<!DOCTYPE html>
<html>
<title>Coppeng Exchange</title>
<body>
<h1>Coppeng Exchange</h1>
<br>

<h2>Apa pertanyaan anda ?</h2> <hr>
<?php if (isset($_GET['id']) && $_GET['id'] != NULL) : ?>
	<?php 
		require('config.php');
		$id = $_GET['id'];
		$query = "select name, email, topic, content from question where id = '".$id."'";
		$data = mysql_query($query);
		$row = mysql_fetch_array($data);
	?>
<form action = 'post.php?id=<?php echo $id; ?>' method = 'POST' >
	<input type = 'text' name = 'Nama' placeholder="Nama" value = "<?php echo $row['name']?>" maxlength = '60'></input>
	<br>
	<input type = 'text' name = 'Email' placeholder="Email" value = "<?php echo $row['email']?>" maxlength = '60'></input>
	<br>
	<input type = 'text' name = 'Topik' placeholder="Topik" value = "<?php echo $row['topic']?>" maxlength = '140'></input>
	<br>
	<textarea rows = '10' cols = '20' placeholder="Konten" name = 'Konten' ><?php echo $row['content']?></textarea>
	<br>
	<input type = 'submit' name = 'kirim' value = 'Update'>
</form>
<?php mysql_close($link); ?>
<?php else : ?>
<form action = 'post.php' method = 'POST' >
	<input type = 'text' name = 'Nama' placeholder="Nama" maxlength = '60' ></input>
	<br>
	<input type = 'text' name = 'Email' placeholder="Email" maxlength = '60'></input>
	<br>
	<input type = 'text' name = 'Topik' placeholder="Topik" maxlength = '140'></input>
	<br>
	<textarea rows = '10' cols = '20' placeholder="Konten" name = 'Konten'></textarea>
	<br>
	<input type = 'submit' name = 'kirim' value = 'Kirim'>
</form>
<?php endif; ?>
</body>
</html>