<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>ASK a Question</title>
	</head>
	<body>		
		<a href="index.php"><H2>SIMPLE STACK EXCHANGE</H2></a>	
		<form action="asked.php" method="post">
		<input type="text" name="name"><br>
		<input type="text" name="mail"><br>
		<input type="text" name="topic"><br>
		<input type="hidden" name="mode" value= <?php echo $_GET['mode'];?> >
		<textarea name="qcontent" cols=50 rows=5></textarea><br>
		<?php		
		if ($_GET['mode']==1) {
			echo "<input type='hidden' name='qid' value='".$_POST["qid"]."'>";
		}
		?>		
		<input type="submit" value="Post">
		</form> 

	</body>
</html>
