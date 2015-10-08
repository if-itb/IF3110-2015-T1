<!DOCTYPE html>
<!--@author : Ignatius Alriana H.M / 13513051-->
<html>
	<head>
		<title>Simple StackExcahange | Ask</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="js/validate.js"></script>
	</head>

	<?php

		include 'dbact.php';
		$id_q = isset($_GET['id_q']) ? $_GET['id_q'] : '';

		$cur = $id_q != '' ? getQuestion($id_q) : array();
		$cur['Name'] = !isset($cur['Name']) ? '' : $cur['Name'];
		$cur['Email'] = !isset($cur['Email']) ? '' : $cur['Email'];
		$cur['Topic'] = !isset($cur['Topic']) ? '' : $cur['Topic'];
		$cur['Content'] = !isset($cur['Content']) ? '' : $cur['Content'];
	?>

	<body>
		<a href="index.php"><h1>Simple StackExchange</h1></a>
		<?php
			if ($id_q == '') echo "<h2>What's your question?</h2>";
			else echo "<h2>Edit your question?</h2>"
		?>
		<div class="garis"></div>
		<form action="addQuestion.php" method="post" name="ask-form">
			<input type="text" name="Name" class="form-field" placeholder="Name" value="<?php echo $cur['Name'] ?>"></input>
			<br>
			<input type="text" name="Email" class="form-field" id="Email" placeholder="Email" value="<?php echo $cur['Email'] ?>"></input>
			<br>
			<input type="text" name="Topic" class="form-field" placeholder="Question Topic" value="<?php echo $cur['Topic'] ?>"></input>
			<br>
			<textarea name="Content" placeholder="Content" class="form-textarea" ><?php echo $cur['Content'] ?></textarea>
			<br>
			<div align="right">
				<input type="submit" value="Post" onclick="return validateForm()" action="addQuestion.php">
			</div>
			<input type="hidden" name="id_q" value="<?php echo $id_q ?>" />
		</form>
	
	</body>
</html> 
