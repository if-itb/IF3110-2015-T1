<!DOCTYPE html>
<html>
<head>
<title>Stack Exchange</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="header">
	<center><h1><a href="index.php">Simple StackExchange</a></h1></center>
</div>

<div class="content">
	<?php if ($_GET["idx"]==1) { ?>
	<form id="question_form" action="submit.php?idx=1" onsubmit="return validateForm()" method="post">
		<center>
			<input type="text" name="name" placeholder="Name"><br>
			<input type="text" name="email" placeholder="Email"><br>
			<input type="text" name="topic" placeholder="Question Topic"><br>
			<textarea rows=5 name="content" placeholder="Content"></textarea><br>
		</center>	
			<button type="submit" name="search" style="float: right">Post</button>
	</form>
	<?php } ?>

	<?php if($_GET["idx"]==2) {
		include "function/database.php";
		$conn = connect_database();
		
		$sql = "SELECT * FROM `question` WHERE question_id=".$_GET["q_id"];

		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		$q_id = $_GET["q_id"];
	?>

	<form id="question_form" action="submit.php?q_id=<?php echo $q_id."&idx=2";?>" onsubmit="return validateForm()" method="post">
		<center>
			<input type="text" name="name" placeholder="Name" value="<?php echo $row['name']?>"><br>
			<input type="text" name="email" placeholder="Email" value="<?php echo $row['email']?>"><br>
			<input type="text" name="topic" placeholder="Topic" value="<?php echo $row['topic']?>"><br>
			<textarea rows=5 name="content" placeholder="Content"><?php echo $row['content']?></textarea><br>
		</center>	
			<button type="submit" name="search" style="float: right">Post</button>
	</form>
	<?php } ?>
	<script src='js/script.js'></script>
</div>
</body>