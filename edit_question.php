<!DOCTYPE html>
<html>
<head>
<title>Stack Exchange</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<center><h1>Simple StackExchange</h1></center>
<br>

<?php
	include "function/database.php";
	$conn = connect_database();
	
	$sql = "SELECT * FROM `question` WHERE question_id=".$_GET["q_id"];

	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$q_id = $_GET["q_id"];
?>

<form id="question-form" action="submit.php?q_id=<?php echo $q_id."&idx=2";?>" method="post">
	<center>
		<input type="text" name="name" placeholder="name" value="<?php echo $row['name']?>"><br>
		<input type="text" name="email" placeholder="email" value="<?php echo $row['email']?>"><br>
		<input type="text" name="topic" placeholder="topic" value="<?php echo $row['topic']?>"><br>
		<textarea name="content" placeholder="content"><?php echo $row['content']?></textarea><br>
	</center>	
		<button type="submit" name="search">Submit</button>
</form>

</body>